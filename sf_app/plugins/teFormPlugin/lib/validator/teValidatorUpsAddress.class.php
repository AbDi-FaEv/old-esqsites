<?php
/**
 * Validator that uses UPS address validation API to validate a simple address
 *
 * @author justin
 * @author richtermeister
 */
class teValidatorUpsAddress extends sfValidatorBase
{
  const HOST_TEST = 'https://wwwcie.ups.com/ups.app/xml/XAV';
  const HOST_LIVE = 'https://onlinetools.ups.com/ups.app/xml/XAV';

  protected $ambiguous_addresses;

  public function configure($options = array(), $messages = array())
  {
    $this -> addRequiredOption('user_id');
    $this -> addRequiredOption('password');
    $this -> addRequiredOption('access_key');
    $this -> addOption('dispatcher');

    $this -> addOption("test_mode", false);
    
    $this -> setMessage("invalid", "This address seems invalid.");
    $this -> addMessage("ambiguous", "This address is ambiguous.");

    parent::configure($options, $messages);
  }

  /**
   * @param   array  $address an associative address, containing the following fields: [street, city, state, zip]
   * @return  array  the valid address
   */
  public function doClean($address)
  {

    $filtered_array = array_filter($address);
    if(empty($filtered_array)) //don't need to validate empty address
    {
      return $address;
    }

    $xml = $this -> generateRequest($address);
    $host = $this -> getOption("test_mode") ? self::HOST_TEST : self::HOST_LIVE;

    if($dispatcher = $this -> getOption("dispatcher"))
    {
      $dispatcher -> notify(new sfEvent($this, "teValidatorUpsAddress.request", array("address" => $address, "request" => $xml)));
    }

    $browser = new sfWebBrowser(array(),'sfCurlAdapter', array('ssl_verify'=> false));
    $response = $browser -> post($host, $xml, array("Content-Type" => "text/xml"));

    if($dispatcher = $this -> getOption("dispatcher"))
    {
      $dispatcher -> notify(new sfEvent($this, "teValidatorUpsAddress.response", array("address" => $address, "response" => $response)));
    }

    $xml = $response -> getResponseXml();
    if(isset($xml -> ValidAddressIndicator) && ($xml -> Response -> ResponseStatusCode == '1'))
    {
      return $address;
    }
    elseif(isset($xml -> AmbiguousAddressIndicator))
    {
      $error = new sfValidatorError($this, "ambiguous");
      $this -> ambiguous_addresses = $this -> extractAddresses($xml);
      throw new sfValidatorErrorSchema($this, array($error)); //global error
    }
    
    $error = new sfValidatorError($this, "invalid"); //could use specific ups message
    throw new sfValidatorErrorSchema($this, array($error)); //global error
  }

  public function getAmbiguousAddresses()
  {
    return $this -> ambiguous_addresses;
  }

  protected function extractAddresses($xml)
  {
    $xml_addresses = $xml -> xpath("AddressKeyFormat");
    foreach($xml_addresses as $xml_address)
    {
      $addresses[] = array(
        "street" => (string) $xml_address -> AddressLine,
        "city" => (string) $xml_address -> PoliticalDivision2,
        "state" => (string) $xml_address -> PoliticalDivision1,
        "zip" => (string) $xml_address -> PostcodePrimaryLow,
        "country" => (string) $xml_address -> CountryCode
      );
    }
    return $addresses;
  }

  public function generateRequest($address_input)
  {
    $requestDoc = new DOMDocument('1.0');
    $accessRequest = $requestDoc -> createElement('AccessRequest');

    $en = $requestDoc->createTextNode('en-US');
    $language = $requestDoc -> createAttribute('xml:lang');
    $language -> appendChild($en);
    $accessRequest -> appendChild($language);
    $accessRequest -> appendChild($requestDoc -> createElement('AccessLicenseNumber', $this -> getOption("access_key")));
    $accessRequest -> appendChild($requestDoc -> createElement('UserId', $this -> getOption("user_id")));
    $accessRequest -> appendChild($requestDoc -> createElement('Password', $this -> getOption("password")));

    $addressDoc = new DOMDocument('1.0');
    $transactionReference = $addressDoc -> createElement('TransactionReference');
    $transactionReference -> appendChild($addressDoc -> createElement('CustomerContext'));
    $transactionReference -> appendChild($addressDoc -> createElement('XpciVersion','1.0'));

    $request = $addressDoc -> createElement('Request');
    $request -> appendChild($transactionReference);
    $request -> appendChild($addressDoc -> createElement('RequestAction','XAV'));
    $request -> appendChild($addressDoc -> createElement('RequestOption','1'));

    $address = $addressDoc -> createElement('AddressKeyFormat');
    $address -> appendChild($addressDoc -> createElement('ConsigneeName'));
    $address -> appendChild($addressDoc -> createElement('BuildingName'));
    $address -> appendChild($addressDoc -> createElement('AddressLine', $address_input['street']));
    $address -> appendChild($addressDoc -> createElement('PoliticalDivision2', $address_input['city']));
    $address -> appendChild($addressDoc -> createElement('PoliticalDivision1', strtoupper($address_input['state'])));
    $address -> appendChild($addressDoc -> createElement('PostcodePrimaryLow', $address_input['zip']));
    $address -> appendChild($addressDoc -> createElement('CountryCode', 'US'));

    $addressValidationRequest = $addressDoc -> createElement('AddressValidationRequest');
    $en = $addressDoc->createTextNode('en-US');
    $language = $addressDoc -> createAttribute('xml:lang');
    $language -> appendChild($en);
    $addressValidationRequest -> appendChild($language);
    $addressValidationRequest -> appendChild($request);
    $addressValidationRequest -> appendChild($address);

    $requestDoc -> appendChild($accessRequest);
    $requestDoc -> formatOutput = true;
    
    $addressDoc -> appendChild($addressValidationRequest);
    $addressDoc -> formatOutput = true;

    return $requestDoc -> saveXml() . $addressDoc -> saveXml();
  }
}
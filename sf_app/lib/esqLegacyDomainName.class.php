<?

//========================================================================================================================//
// This class register's a domain name ONLY
//========================================================================================================================//

class esqLegacyDomainName
{

	const RESPONSE_AVAILABLE = "210";
	const RESPONSE_NOT_AVAILABLE = "211";
	
	const REGISTRATION_TYPE_NEW = "1";
	const REGISTRATION_TYPE_OWN = "2";

	var $the_URL; // The url request to send to the register.com gateway
	var $response;
	
	var $SLD;
	var $TLD;
	
	var $ChargeAmount;
	var $NumYears;
	
	var $UseCreditCard; // credit card flag, "yes" for yes
	var $EndUserIP; // user's IP address
	var $RegistrantFirstName; // first name
	var $RegistrantLastName; // last name
	//var $RegistrantJobTitle; // job title // NOT USED :)
	var $RegistrantAddress1; // the address
	var $RegistrantCity; // the city
	var $RegistrantStateProvince; // the state
	var $RegistrantPostalCode; // zipcode
	var $RegistrantCountry; // country
	var $RegistrantEmailAddress; // email address
	var $RegistrantPhone; // phone number
	var $CardType; // type of credit card
	var $CCName; // full name on credit card
	var $CreditCardNumber; // credit card number
	var $CreditCardExpMonth; // creadit card expiration month
	var $CreditCardExpYear; // credit card expiration year
	var $CVV2; // the CVV2 card verification number
	var $CCAddress; // credit card addrss
	var $CCZip; // credit card zipcode
	var $CCCountry; // sets the credit card country
	
	var $NS1;
	var $NS2;
	var $NS3;
	var $Renewname; // 1 = auto renew the domain name, 0 = do NOT auto renew the domain name
	
	var $mode; // test OR live
	var $command; // Check OR Purchase

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: domainName
// PURPOSE: constructor function
///////////////////////////////////////////////////////////////////////////////////////////////////
function domainName()
{

}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_ChargeAmount
// PURPOSE: sets the amount ON TOP OF the 10 dollars per domain, so the ChargeAmount the the money 
//          that goes into OUR checking account :) ohhh yeaa baby!!!!
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_ChargeAmount($amount)
{
	$this->ChargeAmount = $amount;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_NumYears
// PURPOSE: sets the number of years to register the domain name for
// STATUS:
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_NumYears($years)
{
	$this->NumYears = $years;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_mode
// PURPOSE: sets the mode to either "test" or "live"
// STATUS: needs testing
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_mode($mode)
{
	if($mode == "live") $this->mode = "https://partner"; // "live" mode

	else if($mode == "test") $this->mode = "partner" . $mode; // "test" mode
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_UseCreditCard
// PURPOSE: sets the UseCreditCard flag, "yes" to use the credit card
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_UseCreditCard($value)
{
	$this->UseCreditCard = $value;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_EndUserIP
// PURPOSE: sets the UseCreditCard flag, "yes" to use the credit card
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_EndUserIP($IP)
{
	$this->EndUserIP = $IP;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantFirstName
// PURPOSE: sets the first name
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantFirstName($firstname)
{
	$this->RegistrantFirstName = $firstname;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantLastName
// PURPOSE: sets the last name
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantLastName($lastname)
{
	$this->RegistrantLastName = $lastname;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantJobTitle
// PURPOSE: sets the job title
// STATUS: NOT USED!!
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantJobTitle($job_title)
{
	$this->RegistrantJobTitle = $job_title;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantAddress1
// PURPOSE: sets the address
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantAddress1($address)
{
	$this->RegistrantAddress1 = $address;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantCity
// PURPOSE: sets the city
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantCity($city)
{
	$this->RegistrantCity = $city;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantStateProvince
// PURPOSE: sets the state
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantStateProvince($state)
{
	$this->RegistrantStateProvince = $state;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantPostalCode
// PURPOSE: sets the postal (zipcode) code
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantPostalCode($postal_code)
{
	$this->RegistrantPostalCode = $postal_code;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantCountry
// PURPOSE: sets the country
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantCountry($country)
{
	$this->RegistrantCountry = $country;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantEmailAddress
// PURPOSE: sets the email address
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantEmailAddress($email)
{
	$this->RegistrantEmailAddress = $email;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_RegistrantPhone
// PURPOSE: sets the phone number
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_RegistrantPhone($phone)
{
	$this->RegistrantPhone = $phone;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CardType
// PURPOSE: sets the credit card type (visa, master card, discover.....)
// STATUS: 
// NOTE: need to ask about ths one, what are valid card types????
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_CardType($type)
{
	$this->CardType = $type;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CCName
// PURPOSE: sets the name on the credit card (FULL NAME ON CREDIT CARD)
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_CCName($name)
{
	$this->CCName = $name;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CreditCardNumber
// PURPOSE: sets the credit card number
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_CreditCardNumber($number)
{
	$this->CreditCardNumber = $number;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CreditCardExpMonth
// PURPOSE: sets the credit card month
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////

function set_CreditCardExpMonth($month)
{
	$this->CreditCardExpMonth = $month;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CreditCardExpYear
// PURPOSE: sets the credit card year
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////

function set_CreditCardExpYear($year)
{
	$this->CreditCardExpYear = $year;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CVV2
// PURPOSE: sets the CVV2 card number
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_CVV2($CVV2)
{
	$this->CVV2 = $CVV2;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CCAddress
// PURPOSE: sets the credit card address
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_CCAddress($address)
{
	$this->CCAddress = $address;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CCZip
// PURPOSE: sets the credit card zipcode
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_CCZip($zipcode)
{
	$this->set_CCZip = $zipcode;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_CCCountry
// PURPOSE: sets the credit card country
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_CCCountry($country)
{
	$this->CCCountry = $country;
}










///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_SLD
// PURPOSE: sets the second level domain name (ex: mikesurf in mikesurf.com)
// STATUS: WORKS
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_SLD($second_level_domain)
{
	$this->SLD = $second_level_domain;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_TLD
// PURPOSE: sets the top level domain name (com, net, org, ....)
// STATUS: WORKS
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_TLD($top_level_domain)
{
	$this->TLD = $top_level_domain;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_NS1
// PURPOSE: sets name server 1
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_NS1($ns1)
{
	$this->NS1 = $ns1;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_NS2
// PURPOSE: sets name server 2
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_NS2($ns2)
{
	$this->NS2 = $ns2;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_NS3
// PURPOSE: sets name server 3
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_NS3($ns3)
{
	$this->NS3 = $ns3;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_Renewname
// PURPOSE: 1 for auto renew of domain name, 0 for NOT auto renew
// STATUS: 
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_Renewname($value)
{
	$this->Renewname = $value;
}



















///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: set_command
// PURPOSE: sets the top level domain name (com, net, org, ....)
// STATUS: WORKS
///////////////////////////////////////////////////////////////////////////////////////////////////
function set_command($command)
{
	$this->command = $command;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: create_address_string
// PURPOSE: creates the http request string to send to register.com's gateway
// STATUS: needs work
///////////////////////////////////////////////////////////////////////////////////////////////////
function create_address_string()
{
	$username = sfConfig::get("app_rcom_username");
    $password = sfConfig::get("app_rcom_password");

    if($username == "" || $password == "")
    {
      throw new sfException("No rcomexpress access credentials set");
    }

    unset($this->the_URL);
	//$this->the_URL = "partnertest.rcomexpress.com/interface.asp"; // THIS ONE FOR TEST ONLY
	$this->the_URL = $this->mode . ".rcomexpress.com/interface.asp"; // THIS ONE IS LIVE!!!
	
	$this->the_URL .= "?Command=" . $this->command . "&UID=".$username."&PW=".$password
				   . "&SLD=" . $this->SLD 
				   . "&TLD=" . $this->TLD;
				   if(isset($this->ChargeAmount)) $this->the_URL .= "&ChargeAmount=" . $this->ChargeAmount;
				   if(isset($this->NumYears)) $this->the_URL .= "&NumYears=" . $this->NumYears;
				   if(isset($this->UseCreditCard)) $this->the_URL .= "&UseCreditCard=" . $this->UseCreditCard;
				   if(isset($this->EndUserIP)) $this->the_URL .= "&EndUserIP=" . $this->EndUserIP;
				   if(isset($this->RegistrantFirstName)) $this->the_URL .= "&RegistrantFirstName=" . $this->RegistrantFirstName;
				   if(isset($this->RegistrantLastName)) $this->the_URL .= "&RegistrantLastName=" . $this->RegistrantLastName;
				   if(isset($this->RegistrantAddress1)) $this->the_URL .= "&RegistrantAddress1=" . $this->RegistrantAddress1;
				   if(isset($this->RegistrantCity)) $this->the_URL .= "&RegistrantCity=" . $this->RegistrantCity;
				   if(isset($this->RegistrantStateProvince)) $this->the_URL .= "&RegistrantStateProvince=" . $this->RegistrantStateProvince;
				   if(isset($this->RegistrantPostalCode)) $this->the_URL .= "&RegistrantPostalCode=" . $this->RegistrantPostalCode;
				   if(isset($this->RegistrantCountry)) $this->the_URL .= "&RegistrantCountry=" . $this->RegistrantCountry;
				   if(isset($this->RegistrantEmailAddress)) $this->the_URL .= "&RegistrantEmailAddress=" . $this->RegistrantEmailAddress;
				   if(isset($this->RegistrantPhone)) $this->the_URL .= "&RegistrantPhone=" . $this->RegistrantPhone;
				   if(isset($this->CardType)) $this->the_URL .= "&CardType=" . $this->CardType;
				   if(isset($this->CCName)) $this->the_URL .= "&CCName=" . $this->CCName;
				   if(isset($this->CreditCardNumber)) $this->the_URL .= "&CreditCardNumber=" . $this->CreditCardNumber;
				   if(isset($this->CreditCardExpMonth)) $this->the_URL .= "&CreditCardExpMonth=" . $this->CreditCardExpMonth;
				   if(isset($this->CreditCardExpYear)) $this->the_URL .= "&CreditCardExpYear=" . $this->CreditCardExpYear;
				   if(isset($this->CVV2)) $this->the_URL .= "&CVV2=" . $this->CVV2;
				   if(isset($this->CCAddress)) $this->the_URL .= "&CCAddress=" . $this->CCAddress;
				   if(isset($this->CCZip)) $this->the_URL .= "&CCZip=" . $this->CCZip;
				   if(isset($this->CCCountry)) $this->the_URL .= "&CCCountry=" . $this->CCCountry;
				   if(isset($this->NS1)) $this->the_URL .= "&NS1=" . $this->NS1;
				   if(isset($this->NS2)) $this->the_URL .= "&NS2=" . $this->NS2;
				   if(isset($this->NS3)) $this->the_URL .= "&NS3=" . $this->NS3;
				   if(isset($this->Renewname)) $this->the_URL .= "&Renewname=" . $this->Renewname;
				  
				   $this->the_URL .= "&ResponseType=xml";
				   
	//echo $this->the_URL . "<br>";
}


///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: domain_name_status_check
// PURPOSE: Checks a given domain name for it's availability status
// STATUS: NOT USED
///////////////////////////////////////////////////////////////////////////////////////////////////
function domain_name_status_check()
{
	$this->set_mode("live"); // "test" or "live"
	$this->set_command("Check"); // Set the command to Check ONLY!!

	return $this->execute_command();
}


///////////////////////////////////////////////////////////////////////////////////////////////////
// NAME: execute_command
// PURPOSE: executes a given command (within a http request string)
// STATUS: WORKS!
///////////////////////////////////////////////////////////////////////////////////////////////////
function execute_command()
{
	$this->create_address_string();

	//***********************Making the connection and getting response************************//
	//*****************************************************************************************//
	
	//echo $this->the_URL;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $this->the_URL);
    curl_setopt($ch, CURLOPT_TIMEOUT, 180);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); 
	$buffer = curl_exec($ch);
	
	//echo "printing buffer... "; print_r($buffer); echo "...done with buffer <br>";
	
	curl_close ($ch);
	//$buffer = explode(" ", $buffer);
	//*****************************************************************************************//
	
	//$returnedXML = simplexml_load_string($buffer);
	
	//echo $buffer;
	return $buffer;
}

function test()
{
	$url = 'https://partner.rcomexpress.com/interface.asp?Command=Check&UID=mikesurf&PW=aek1615&SLD=mikesurf&TLD=com&ResponseType=xml';
	
	//$url = 'https://partnertest.rcomexpress.com/interface.asp?Command=Check&UID=mikesurf&PW=apartment1&SLD=mikesurf&TLD=com&ResponseType=xml';
	
	//$url = 'https://esqsites123.com/admin/scripts/requestUsernamePassword.php?email=mike@mike.net';
	
	//$url = 'http://72.3.133.178/testxml.php';

	//$curl_handle=curl_init($url);
	//curl_setopt($curl_handle,CURLOPT_URL, $url);
	//curl_setopt($curl_handle, CURLOPT_POSTFIELDS, 1);
	//curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
	//curl_setopt($curl_handle, CURLOPT_HEADER, 0);
	//curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	$ch=curl_init(); 
	   curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_TIMEOUT, 180);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($this -> command != "Check")
	{
       curl_setopt($ch, CURLOPT_POST, 1);
	}
	   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
	   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); 
      // curl_setopt($ch, CURLOPT_POSTFIELDS, 'Command=Check&UID=mikesurf&PW=apartment1&SLD=mikesurf&TLD=com&ResponseType=html'); 
	$buffer = curl_exec($ch);
	curl_close($ch);

	echo $buffer;
}


} // End domainName class definition


?>

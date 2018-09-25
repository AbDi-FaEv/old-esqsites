<?php

/**
 * allows spam-checking content via akismet|typepad api
 *
 * @author Richtermeister
 */
class SpamCheckerApi
{
  const HOST_AKISMET = 'rest.akismet.com/1.1';
  const HOST_TYPEPAD = 'api.antispam.typepad.com/1.1';
  
  protected $api_key;
  protected $api_host;
  protected $site_url;

  protected $browser;
  protected $dispatcher;

  /**
   * @param string $api_key
   * @param string $site_url the url of the site using the service
   * @param string $api_host the url to the api host (including version)
   * @param sfWebBrowser $browser (optional) the browser to use to make requests
   */
  public function  __construct($api_key, $site_url = null, $api_host = self::HOST_AKISMET, sfWebBrowser $browser = null)
  {
    $this -> api_key  = $api_key;
    $this -> api_host = $api_host;
    $this -> browser  = $browser;

    $this -> setSiteUrl($site_url); //via method to ensure http
  }

  /**
   * @return sfWebBrowser
   */
  public function getBrowser()
  {
    if(!$this -> browser)
    {
      $this -> browser = new sfWebBrowser(array(
        'timeout'    => 5,
        'user_agent' => 'Symfony/'.sfConfig::get('sf_version')
      ));
    }
    return $this -> browser;
  }

  /**
   * allows customizing the browser instance to use for api requests
   *
   * @param sfWebBrowser $browser
   * @return SpamCheckerApi
   */
  public function setBrowser(sfWebBrowser $browser)
  {
    $this->browser = $browser;
    return $this; //fluent
  }

  protected function log($message)
  {
    if($this->dispatcher)
    {
      $this->dispatcher -> notify(new sfEvent($this, 'application.log', array("message" => $message)));
    }
  }

  public function setEventDispatcher(sfEventDispatcher $dispatcher)
  {
    $this -> dispatcher = $dispatcher;
  }

  /**
   * allows configuring the url of the site using the service
   *
   * @param string $site_url
   * @return SpamCheckerApi
   */
  public function setSiteUrl($site_url)
  {
    $this->site_url = (0 === strpos($site_url, "http://")) ? $site_url : "http://".$site_url;
    return $this; //fluent
  }

  /**
   * allows configuring the api host
   *
   * @param string $api_host
   * @return SpamCheckerApi
   */
  public function setApiHost($api_host)
  {
    $this->api_host = $api_host;
    return $this;
  }

  /**
   * returns whether the api key is valid for the selected host
   *
   * @return bool
   */
  public function isValid()
  {
    $params  = array(
      'key'  => $this->api_key
    );

    return strtolower($this->call("verify-key", $params)) == 'valid';
  }

  /**
   * returns if the passed parameters look like spam
   *
   * @param array $params
   * @return bool
   */
  public function isSpam(array $params)
  {
    return strtolower($this->call('comment-check', $params)) == 'true';
  }

  public function submitSpam(array $params)
  {
    $this->call('submit-spam', $params);
  }

  public function submitHam(array $params)
  {
    $this->call('submit-ham', $params);
  }

  /**
   * issues a command to the api
   *
   * @param string $command the command to send
   * @param array $params the parameters to send
   * @return string
   */
  protected function call($command, array $params)
  {
    $browser = $this -> getBrowser();

    $host = $command == 'verify-key' ? "http://".$this -> api_host : "http://".$this -> api_key.".".$this -> api_host;
    $url = $host."/".$command;

    //ensure we have blog param set
    if(!array_key_exists("blog", $params))
    {
      $params["blog"] = $this->site_url;
    }

    $this -> log(sprintf("calling: %s with: %s", $url, print_r($params, true)));
    
    try
    {
      if ($browser->post($url, $params)->responseIsError())
      {
        throw new sfException(sprintf('The given URL (%s) returns an error (%s: %s)', $url, $browser->getResponseCode(), $browser->getResponseMessage()));
      }
    }
    catch (Exception $e)
    {
      throw new sfException('Could not contact server: '.$e -> getMessage());
    }

    $this->log("response: ".$browser->getResponseText());
    return $browser->getResponseText();
  }

  /**
   * extracts the useful parameters from a request object
   * 
   * @param sfWebRequest $request
   * @return array
   */
  public static function getParamsFromRequest(sfWebRequest $request)
  {
    return array(
      "blog"        => $request->getHost(),
      "user_ip"     => $request->getRemoteAddress(),
      "user_agent"  => $request->getHttpHeader('User-Agent'),
      "referrer"    => $request->getReferer()
    );
  }

}
<?php

/**
 * index actions.
 *
 * @package    esqsites123
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class indexActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this -> getUser() -> setAttribute("test", "test_".time());
  }

  public function executeComingSoon()
  {
    
  }

  public function executeTutorials()
  {
    $this -> tutorials = $this -> getTutorials();
  }

  protected function getTutorials()
  {
    $tutorials = sfYaml::load(file_get_contents(sfConfig::get("sf_data_dir")."/tutorials.yml"));
    foreach($tutorials as $key => $tutorial)
    {
      $tutorials[$key]["title"] = substr($tutorial["file"], 0, strpos($tutorial["file"], "."));
    }
    return $tutorials;
  }

  public function executeTutorial(sfWebRequest $request)
  {
    $tutorials = $this -> getTutorials();
    $this -> forward404Unless(isset($tutorials[$request -> getParameter("id")]));

    $this -> tutorial = $tutorials[$request -> getParameter("id")];
    $this -> getResponse() -> setTitle($this -> tutorial["title"]);
  }

  /**
   *  @todo lots of refactoring here
   */
  public function executeCheckDomain(sfWebRequest $request)
  {
    if(!$request -> isXmlHttpRequest())
    {
      $this -> form = new DomainCheckForm(); //regular request, display a form
    }

    if($request -> getMethod() == sfRequest::POST)
    {
      if($request -> isXmlHttpRequest())
      {
        return $this -> handleAjaxDomainCheck(); //request via ajax
      }
      else
      {
        $this -> form -> bind($request -> getParameter($this -> form -> getName()));
        if($this -> form -> isValid())
        {
          $this -> message = "This domain is available";
        }
      }
    }
  }

  protected function handleAjaxDomainCheck()
  {
    $params = $this -> getRequest() -> getParameterHolder() -> getAll();
    $domain_name      = $params["domain_name"];
    $domain_type      = $params["domain_type"];
    $domain_reg_type  = $params["domain_reg_type"];

    $domain = $domain_name.".".$domain_type;
    $validator = new esqDomainValidator();
    $response_format = '<div id="domain_message" class="%s">%s</div>';
    
    try
    {
      $domain = $validator -> clean($domain);
    }
    catch(sfValidatorError $e)
    {
      $return = array("result" => false, "message" => sprintf($response_format, "error", (string) $e -> getMessage()));
      return $this -> renderText(json_encode($return));
    }

    if($domain_reg_type == esqLegacyDomainName::REGISTRATION_TYPE_OWN)
    {
      $message = "<strong>Congratulations! This domain is available!</strong><br />If you'd like to register it as a new domain just select \"Register a new domain name\" above.";
    }
    else
    {
      $message = "<strong>Congratulations! This domain is available!</strong>";
    }
    $return = array("result" => true, "message" => sprintf($response_format, "success", $message));
    return $this -> renderText(json_encode($return));
  }

  public function executeBreak()
  {
    throw new sfException("Testing - Please disregard.");
  }

  public function executeError(sfWebRequest $request)
  {
    if($request -> getParameter("secret") == "gabbagabbahey")
    {
      throw new sfException("Error caused on purpose - Testing Error");
    }
    $this -> forward404();
  }

  public function executeError404()
  {
    
  }

  public function executeDemoRequest(sfWebRequest $request)
  {
    $this -> form = new DemoRequestForm();
    if($request -> getMethod() == sfRequest::POST)
    {
      $captcha = array(
        'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
        'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
      );
      $input = array_merge($request -> getParameter($this -> form -> getName()), array("captcha" => $captcha));
      $this -> form -> bind($input);
      if($this -> form -> isValid())
      {
        $from     = array($this -> form -> getValue("email") => $this -> form -> getValue("name"));
        $to       = sfConfig::get("app_teContactFormPlugin_recipients");
        $subject  = "New Demonstration Request";
        $body     = $this -> getPartial("demoRequestEmail", array("values" => $this -> form -> getValues()));
        
        $this -> getMailer() -> composeAndSend($from, $to, $subject, $body);

        $this -> redirect("@demo_request_thanks");
      }
    }
  }

  public function executeDemoRequestThanks()
  {
    
  }

  public function executeServices()
  {
    
  }

  public function executeAbout()
  {
    
  }

  public function executeTerms()
  {
    
  }

  public function executeLegal()
  {
    
  }

  public function executePrivacy()
  {
    
  }

}

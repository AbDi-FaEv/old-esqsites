<?php

/**
 * index actions.
 *
 * @package    upperstrata
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class teContactFormActions extends sfActions
{

  public function executeHandleForm(sfWebRequest $request)
  {
  	if($request -> isXmlHttpRequest())
  	{
      $this -> setTemplate("handleAjaxForm");
  	}
    else
    {
      //we're on the actual contact page, so we disable ajax in case the form is also in a sidebar.
      //(2 identical forms with ajax break)
      sfConfig::set("app_teContactFormPlugin_use_ajax", false);
    }

  	$form = new teSimpleContactForm();
  	$this -> form = $form;
  	if($request -> getMethod() == sfRequest::POST)
  	{
      $form -> bind($request -> getParameter($this -> form -> getName()));
      if($form -> isValid())
      {
        try
        {
          $message = $this -> getMailer() -> compose(
            array($form -> getValue("email") => $form -> getValue("name")),
            sfConfig::get("app_teContactFormPlugin_recipients", sfConfig::get("app_sfErrorNotifier_email")),
            sfConfig::get("app_teContactFormPlugin_subject", 'New Contact Form Submission'),
            $this -> getPartial("teContactForm/email", array("form_values" => $form -> getValues()))
          );

          $message -> setContentType("text/html");
          $this -> getMailer() -> send($message);

          return sfView::SUCCESS;
        }
        catch(Exception $e)
        {
          $this -> logMessage($e -> getMessage(), sfLogger::ERR);
          $this -> setTemplate("handleAjaxForm");
          return "Broken";
        }
      }
  	}
  	return sfView::ERROR;

  }
}

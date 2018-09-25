<?php

/**
 * Base actions for the teFormHandlerPlugin teFormHandler module.
 * 
 * @package     teFormHandlerPlugin
 * @subpackage  teFormHandler
 * @author      Richtermeister
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BaseteFormHandlerActions extends sfActions
{

  public function executeHandleForm(sfWebRequest $request)
  {
    if(!$form_type = $this -> getRequest() -> getParameter("form"))
    {
      throw new sfException("You have to provide a form type");
    }

    $this -> form = $this -> getForm($form_type);
    if($request -> getMethod() == sfRequest::POST)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $this -> handleFormSubmission($this -> form);
        $this -> setTemplate("handleFormThanks");
      }
    }

    if(!$request -> isXmlHttpRequest())
    {
      sfConfig::set("app_teFormHandlerPlugin_use_ajax", false);
    }
  }

  public function executeHandleCmsForm(sfWebRequest $request)
  {
    $page = $this -> getRoute() -> getObject();

    $form = $page -> getForm();
    $form -> bind($request -> getParameter($form -> getName()));
    if($form -> isValid())
    {
      $this -> handleFormSubmission($form);
    }

    $this -> forward("teCmsFront", "showPage");
  }

  protected function handleFormSubmission(sfForm $form)
  {
    $values   = $form -> getValues();
    $settings = $this -> getSettings($form);

    if($settings["save"])
    {
      //check if form can be saved directly
      if(method_exists($form, "save"))
      {
        $form -> save();
      }
      else
      {
        $submission = new teFormSubmission();
        $submission -> setContent(serialize($values));
        $submission -> setFormType($this -> getRequest() -> getParameter("form"));
        $submission -> save();
      }
    }

    //consider sending setting through a filter event

    if(isset($settings["email"]) && $settings["email"]) //email enabled
    {
      if(is_string($settings["email"]))
      {
        $settings["email"] = array("recipients" => $settings["email"], "subject" => "New Form Submission");
      }
      $email_settings = $settings["email"];

      if(isset($email_settings["recipients"]))
      {
        $from     = (isset($email_settings["from"]) ? $email_settings["from"] : $values['email']);
        $to       = $email_settings["recipients"];
        $subject  = $email_settings["subject"];

        if($email_settings["type"] == "inform")
        {
          $body = $this -> getPartial("email", array("values" => $values));
        }
        elseif($email_settings["type"] == "notify")
        {
          $body = $email_settings["message"];
        }
        else
        {
          throw new sfException(sprintf("Invalid notification type %s", $email_settings["type"]));
        }

        $message = Swift_Message::newInstance()
          ->setFrom($from)
          ->setTo($to)
          ->setSubject($subject)
          ->setBody($body, 'text/html');

        $this -> getMailer() -> send($message);
      }
    }
  }

  protected function getSettings($form_type)
  {
    if($form_type instanceof sfForm)
    {
      $form_type = get_class($form_type);
    }

    $settings = sfConfig::get(sprintf("app_teFormHandlerPlugin_%s", $form_type), array());
    return sfToolkit::arrayDeepMerge(sfConfig::get("app_teFormHandlerPlugin_all", array()), $settings);
  }

  protected function getForm($form_type)
  {
    $settings = $this -> getSettings($form_type);

    $form_class = isset($settings["class"]) ? $settings["class"] : $form_type;
    if(!class_exists($form_class))
    {
      throw new sfException(sprintf("Class %s not found", $form_class));
    }

    $defaults = isset($settings["defaults"]) ? $settings["defaults"] : array();
    $options = isset($settings["options"]) ? $settings["options"] : array();
    return new $form_class($defaults, $options);
  }
}

<?php
/**
 * Description of DemoRequestForm
 *
 * @author Richtermeister
 */
class DemoRequestForm extends sfForm
{
  public function setup()
  {
    $time_choices = array("either" => "Anytime", "am" => "In the Morning", "pm" => "In the Afternoon");
    $source_choices = array(
      "" => "-- Please Select",
      "search_engine" => "Search Engine",
      "friend" => "Friend",
      "magazine" => "Magazine",
      "bar_association" => "Bar Association",
      "conference" => "Conference / Trade Show",
      "other" => "Other");
    
    $this -> setWidgets(array(
      "name" => new sfWidgetFormInput(),
      "email" => new sfWidgetFormInput(),
      "phone" => new sfWidgetFormInput(),
      "best_time" => new sfWidgetFormSelect(array("choices" => $time_choices)),
      "how_did_you_hear" => new sfWidgetFormSelect(array("choices" => $source_choices)),
      "other_detail" => new sfWidgetFormInput(),
      "comments" => new sfWidgetFormTextarea()
    ));

    $this -> setValidators(array(
      "name" => new sfValidatorString(),
      "email" => new sfValidatorEmail(),
      "phone" => new sfValidatorString(),
      "best_time" => new sfValidatorString(),
      "how_did_you_hear" => new sfValidatorString(),
      "other_detail" => new sfValidatorString(array("required" => false)),
      "comments" => new sfValidatorString(array("required" => false))
    ));

    $this -> widgetSchema -> setLabel("how_did_you_hear", "How did you hear about us?");
    $this -> widgetSchema -> setLabel("other_detail", "Could you tell us where?");

    if(($public_key = sfConfig::get("app_captcha_public_key")) && ($private_key = sfConfig::get("app_captcha_private_key")))
    {
      $this -> widgetSchema["captcha"] = new sfWidgetFormReCaptcha(array("label" => "Spam Blocker", "public_key" => $public_key));
      $this -> validatorSchema["captcha"] = new sfValidatorReCaptcha(array("private_key" => $private_key), array("captcha" => "Sorry, this was invalid. Please try again."));
    }

    $this -> widgetSchema -> setDefaultFormFormatterName("list");
    $this -> widgetSchema -> setNameFormat("demo_request[%s]");
  }
}
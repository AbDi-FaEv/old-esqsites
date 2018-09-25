<?php
/**
 *
 * @author Richtermeister
 */
class CancellationForm extends sfForm
{
  public function setup()
  {
    $public_key = sfConfig::get("app_captcha_public_key");
    $private_key = sfConfig::get("app_captcha_private_key");

    $this -> setWidgets(array(
      "captcha" => new sfWidgetFormReCaptcha(array("public_key" => $public_key, "label" => "Confirmation")),
      "comment" => new sfWidgetFormTextarea(array("label" => "Comment/Note")),
      "delete" => new sfWidgetFormInputCheckbox(array("label" => "Delete From Server"))
    ));

    $this -> setValidators(array(
      "captcha" => new sfValidatorReCaptcha(array("private_key" => $private_key), array("captcha" => "Sorry, this was invalid. Please try again.")),
      "comment" => new sfValidatorString(array("required" => false)),
      "delete" => new sfValidatorBoolean()
    ));

    $this -> widgetSchema -> setNameFormat("cancel[%s]");
  }
}
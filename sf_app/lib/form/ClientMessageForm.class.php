<?php

/**
 * ClientMessage form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ClientMessageForm extends BaseClientMessageForm
{
  public function configure()
  {
    $this -> validatorSchema["email"] = new sfValidatorEmail(array(), array("invalid" => "This email seems invalid."));
    $this -> validatorSchema["message"] -> setOption("required", true);

    if(($public_key = sfConfig::get("app_captcha_public_key")) && ($private_key = sfConfig::get("app_captcha_private_key")))
    {
      $this -> widgetSchema["captcha"] = new sfWidgetFormReCaptcha(array("public_key" => $public_key));
      $this -> widgetSchema["captcha"] -> setLabel("Spam Blocker");
      $this -> validatorSchema["captcha"] = new sfValidatorReCaptcha(array("private_key" => $private_key), array("captcha" => "Sorry, this was invalid. Please try again."));
    }

    $this -> widgetSchema -> setDefaultFormFormatterName("TeList");

    $this -> useFields(array("name", "email", "phone", "subject", "message", "captcha"));
  }
}

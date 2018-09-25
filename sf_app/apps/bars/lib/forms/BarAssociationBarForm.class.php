<?php
/**
 * BarAssociation form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class BarAssociationBarForm extends BarAssociationForm
{
  public function configure()
  {
    parent::configure();

    $this -> widgetSchema["password"] = new sfWidgetFormInputPassword();
    $this -> widgetSchema["password_repeat"] = new sfWidgetFormInputPassword(array("label" => "Password Repeat"));

    $this -> validatorSchema["password"] = new esqValidatorPassword(array("required" => false));
    $this -> validatorSchema["password_repeat"] = new sfValidatorString(array("required" => false));

    $this -> validatorSchema["id"] = new sfValidatorChoice(array("choices" => array($this -> getObject() -> getId()))); //ensure this form isn't hackable

    $this -> widgetSchema["logo"] = new sfWidgetFormInputFile();
    $this -> validatorSchema["logo"] = new sfValidatorFile(array("required" => false, "path" => sfConfig::get("sf_cache_dir")));

    $this -> mergePostValidator(new sfValidatorSchemaCompare("password", "==", "password_repeat", array("throw_global_error" => true), array("invalid" => "The passwords you entered didn't match. Please try again.")));

    $this -> useFields(array("password", "password_repeat", "logo"));
  }

  public function updatePasswordColumn($password)
  {
    return (empty($password)) ? false : $password;
  }
}

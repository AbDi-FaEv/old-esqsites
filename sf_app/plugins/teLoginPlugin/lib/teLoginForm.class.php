<?php
/**
 * Description of teLoginFormclass
 *
 * @author Richtermeister
 */
class teLoginForm extends BaseForm
{
  public function setup()
  {
    if(!$this -> getOption("validator_options"))
    {
      throw new sfException("Login form requires an array of validator options");
    }

    $this -> setWidgets(array(
      "username" => new sfWidgetFormInput(),
      "password" => new sfWidgetFormInputPassword()
    ));

    $this -> setValidators(array(
      "username" => new sfValidatorString(),
      "password" => new sfValidatorString()
    ));

    if($this->getOption('with_remember'))
    {
      $this->widgetSchema["remember"] = new sfWidgetFormInputCheckbox(array('label' => 'Remember Me'));
      $this->validatorSchema["remember"] = new sfValidatorBoolean(array('required' => false));
    }

    $this -> mergePostValidator(new teLoginValidator($this -> getOption("validator_options")));

    $this -> widgetSchema -> setNameFormat("login[%s]");
  }
}
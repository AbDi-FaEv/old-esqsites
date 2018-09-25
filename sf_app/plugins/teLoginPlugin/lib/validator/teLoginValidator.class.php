<?php
/**
 *
 * @author Richtermeister
 */
class teLoginValidator extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addRequiredOption("model");

    $this->addOption('form_username_field', 'username'); //username field within form
    $this->addOption('form_password_field', 'password'); //password field within form

    $this->addOption('username_field', 'username'); //username field within model
    $this->addOption("return_as", "user");
    
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'The username and/or password is invalid.');
  }

  /**
   * @see sfValidatorBase
   */
  protected function doClean($values)
  {
    // only validate if username and password are both present
    if (isset($values[$this->getOption('form_username_field')]) && isset($values[$this->getOption('form_password_field')]))
    {
      $username = $values[$this->getOption('form_username_field')];
      $password = $values[$this->getOption('form_password_field')];

      // user exists?
      if ($user = PropelQuery::from($this -> getOption("model")) -> filterByArray(array($this -> getOption("username_field") => $username)) -> findOne())
      {
        // password is ok?
        if ($user->checkPassword($password))
        {
          return array_merge($values, array($this -> getOption("return_as") => $user));
        }
      }

      if ($this->getOption('throw_global_error'))
      {
        throw new sfValidatorError($this, 'invalid');
      }

      throw new sfValidatorErrorSchema($this, array(
        $this->getOption('form_username_field') => new sfValidatorError($this, 'invalid'),
      ));
    }

    // assume a required error has already been thrown, skip validation
    return $values;
  }

}
<?php

/**
 * Customer form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CustomerAdminForm extends BaseCustomerForm
{
  public function configure()
  {

    $this -> useFields(array("type", "bar_association_id", "credit_bar_association", "sales_person_id", "username", "password", "status", "first_name", "middle_name", "last_name", "email", "birthdate", "phone", "fax", "skill_level"));

    if(($user = $this -> getOption("user")) && !$user instanceof sfGuardSecurityUser)
    {
      throw new InvalidArgumentException("Expecting sfGuardSecurityUser instance");
    }

    $this -> widgetSchema["skill_level"] = new sfWidgetFormChoice(array('choices' => Customer::getSkillLevelChoices()));
    $this -> validatorSchema["skill_level"] = new sfValidatorChoice(array('choices' => array_keys(Customer::getSkillLevelChoices())));
  	$this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => Customer::getStates()));
    
    $type_choices = array_intersect_key(Customer::getTypes(), array_flip(array(Customer::TYPE_REGULAR, Customer::TYPE_TEST)));
  	$this -> widgetSchema["type"] = new sfWidgetFormSelect(array("choices" => $type_choices));
  	$this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys(Customer::getStates())));
  	$this -> validatorSchema["email"] = new sfValidatorEmail(array(), array("invalid" => "This email seems invalid"));

    //add unique validator for username and email
    $this -> validatorSchema["username"] -> setOption("min_length", 5);
    $this -> validatorSchema["password"] = new esqValidatorPassword();
    $this -> validatorSchema["password"] -> setOption("required", $this -> getObject() -> isNew());

    $this -> widgetSchema["birthdate"] = new esqWidgetFormBirthdate();
    $this -> validatorSchema["birthdate"] = new sfValidatorDate(array("required" => false));

    if($this -> isNew())
    {
      $website = new Website();
      $website -> setStatus(Website::STATUS_ACTIVE);
      $website -> setType(Website::TYPE_PURCHASED);

      //associate things
      $website -> setCustomer($this -> object);
      $website_form = new WebsiteAdminForm($website);
      unset($website_form["customer_id"], $website_form["last_billing_date"]); //customer is being created at the same time
      $this -> embedForm("website_form", $website_form);
      $this -> widgetSchema["website_form"] -> setLabel(false);

      $this -> setDefault("type", Customer::TYPE_TEST);

      unset($this["status"]); //active by default
    }

    //custom validation to ensure unique fields within active customers only (ignoring shopping customers)
    $criteria = CustomerPeer::getActiveCriteria();
    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new esqValidatorPropelUnique(array('model' => 'Customer', 'column' => array('email'), 'criteria' => $criteria)),
        new esqValidatorPropelUnique(array('model' => 'Customer', 'column' => array('username'), 'criteria' => $criteria)),
        new esqValidatorPropelUnique(array('model' => 'Customer', 'column' => array('mb_client_id'), 'criteria' => $criteria)),
      ))
    );

    foreach($this -> validatorSchema -> getPostValidator() -> getValidators() as $validator)
    {
      switch(implode("", $validator -> getOption("column")))
      {
        case "email":
          $validator -> setMessage("invalid", "A customer with this email already exists");
        break;
        case "username":
          $validator -> setMessage("invalid", "A customer with this username already exists");
        break;
        case "mb_client_id":
          $validator -> setMessage("invalid", "A customer with this ModernBill ID already exists");
        break;
      }
    }
    
  }

  public function updatePhoneColumn($input)
  {
    return preg_replace ("/[^\d]/i", "", $input); //strip non-numeric characters
  }

  public function updateFaxColumn($input)
  {
    return preg_replace ("/[^\d]/i", "", $input);
  }

  //need this function because original code stores bdays as strings
  public function updateBirthdateColumn($input)
  {
    if($input)
    {
      $bits = explode("-", $input);
      $year = $bits[0];
      $month = $bits[1];
      $day = $bits[2];
      return $month.$day.$year;
    }
  }
}

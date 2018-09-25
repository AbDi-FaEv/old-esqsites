<?php

/**
 * DomainAdmin form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class DomainAdminForm extends BaseDomainForm
{
  public function configure()
  {
    unset($this["created_at"], $this["updated_at"], $this["rank"]);

    if($this -> object -> getWebsiteId())
    {
      unset($this["website_id"]); //cannot reassign domains
    }
    else
    {
      $this -> widgetSchema["website_id"] -> setOption("criteria", WebsitePeer::getActiveCriteria());
      $this -> widgetSchema["website_id"] -> setOption("add_empty", true);
    }
    
    $registration_type_choices = Domain::getRegistrationTypes();
    $this -> widgetSchema["registration_type"] = new sfWidgetFormSelect(array("choices" => $registration_type_choices, "label" => "Registered with"));
    $this -> validatorSchema["registration_type"] = new sfValidatorChoice(array("choices" => array_keys($registration_type_choices), "required" => false));
    
    $status_choices = Domain::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys($status_choices), "required" => true));

    //add domain validator

    $this -> widgetSchema["name"]     = new esqWidgetFormDomainName();
    $this -> validatorSchema["name"]  = new esqValidatorDomainName();

    $this -> widgetSchema["type"] = new sfWidgetFormChoice(array("choices" => Domain::getTypes()));
    $this -> validatorSchema["type"] = new sfValidatorChoice(array("choices" => array_keys(Domain::getTypes())));

    if($post_validator = $this -> validatorSchema -> getPostValidator())
    {
      $post_validator -> setMessage("invalid", "A domain with this name already exists");
    }

    $this -> widgetSchema["expiration_date"] = new sfWidgetFormJQueryDate();
    $this -> widgetSchema["last_renewal_date"] = new sfWidgetFormJQueryDate();
    
    $criteria = DomainPeer::getActiveCriteria();
    $this->validatorSchema->setPostValidator(
      new esqValidatorPropelUnique(array('model' => 'Domain', 'column' => array('name'), 'criteria' => $criteria), array('invalid' => "This domain is already in our system"))
    );

    if($this -> isNew())
    {
      unset($this["status"]);
    }
  }
}

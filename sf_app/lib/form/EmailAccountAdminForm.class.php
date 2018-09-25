<?php

/**
 * EmailAccount form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EmailAccountAdminForm extends BaseEmailAccountForm
{
  
  public function configure()
  {
    unset($this["created_at"], $this["updated_at"]);
    
    $this -> widgetSchema["website_id"] -> setOption("criteria", WebsitePeer::getActiveCriteria());
    $this -> widgetSchema["website_id"] -> setOption("add_empty", false);
    
    $this -> widgetSchema["domain_name_id"] -> setOption("criteria", DomainPeer::getActiveCriteria());
    $this -> widgetSchema["domain_name_id"] -> setOption("add_empty", false);
    
    $status_choices = EmailAccount::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys($status_choices), "required" => true));
    
    $this -> validatorSchema["local_address"] -> setOption("required", true);
    $this -> validatorSchema["local_address"] -> setMessage("required", "Please enter an address.");
    $this -> validatorSchema["forwarding_address"] = new sfValidatorEmail(array("trim" => true), array("invalid" => "This email seems invalid."));
    $this -> validatorSchema["forwarding_address"] -> setOption("required", true);

    $this -> validatorSchema -> setPostValidator(
        new sfValidatorCallback(
            array("callback" => array("EmailAccountAdminForm", "validateEmail"))));
  }

  public static function validateEmail($validator, $values)
  {
    $values["local_address"] = trim($values["local_address"]);
    $local_address = $values["local_address"];

    if($local_address)
    {
      $domain = DomainPeer::retrieveByPK($values["domain_name_id"]);
      $complete_email = $local_address."@".$domain -> getName();

      $validator = new sfValidatorEmail(array("trim" => true), array("invalid" => "This email address seems invalid"));
      try
      {
        $valid = $validator -> clean($complete_email);

      }
      catch(sfValidatorError $e)
      {
        //associate this error with the from address field
        throw new sfValidatorErrorSchema($validator, array("local_address" => $e));
      }
    }
    return $values;
  }
}
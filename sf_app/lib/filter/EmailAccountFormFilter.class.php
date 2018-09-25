<?php

/**
 * EmailAccount filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class EmailAccountFormFilter extends BaseEmailAccountFormFilter
{
  public function configure()
  {
    $status_choices = array("" => "") + EmailAccount::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys(EmailAccount::getStates()), "required" => false));
    
    $this -> widgetSchema["website_id"] -> setOption("criteria", WebsitePeer::getActiveCriteria());
    $this -> widgetSchema["website_id"] -> setOption("add_empty", true);
    
    $criteria = DomainPeer::getActiveCriteria();
    $criteria -> addAscendingOrderByColumn(DomainPeer::NAME);
    $this -> widgetSchema["domain_name_id"] -> setOption("criteria", $criteria);
    $this -> widgetSchema["domain_name_id"] -> setOption("add_empty", true);
  }
  
  //a little hackish?
  public function getFields()
  {
    $fields = parent::getFields();
    $fields["status"] = "ForeignKey";
    return $fields;
  }
}

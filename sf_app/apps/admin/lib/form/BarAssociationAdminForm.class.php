<?php
/**
 *
 * @author Richtermeister
 */
class BarAssociationAdminForm extends BarAssociationForm
{
  public function configure()
  {
    $this -> widgetSchema["contact_info"] -> setAttribute("rows", "10");
    $this -> validatorSchema["primary_contact_email"] = new sfValidatorEmail(array("required" => false));

    $this -> widgetSchema["affinity_expiration_date"] = new sfWidgetFormJQueryDate(array("config" => "{changeMonth: true, changeYear: true}"));
    $this -> widgetSchema["affinity_start_date"]      = new sfWidgetFormJQueryDate(array("config" => "{changeMonth: true, changeYear: true}"));
  }
}
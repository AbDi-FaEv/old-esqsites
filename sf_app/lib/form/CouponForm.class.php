<?php

/**
 * Coupon form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CouponForm extends BaseCouponForm
{
  public function configure()
  {
    $this -> useFields(array("code", "description", "setup", "coupon_to_hosting_plan_link_list", "bar_association_id", "max_usage", "activation_date", "expiration_date", "status"));
    
    $this -> widgetSchema["status"] = new sfWidgetFormChoice(array("choices" => Coupon::getStates()));

    $this -> mergePostValidator(
            new sfValidatorPropelUnique(
                    array("model" => "Coupon", "column" => array("code")),
                    array("invalid" => "A coupon with this code exists already.")));

    $this -> validatorSchema["setup"] = new sfValidatorNumber(array('min' => 0, "max" => 100));

    foreach(HostingPlanQuery::create() -> find() as $plan)
    {
      $plan_valid_choices[] = $plan -> getId();
      $plan_choices[$plan -> getStatusString()][$plan -> getId()] = (string) $plan;
    }
    $this -> widgetSchema['coupon_to_hosting_plan_link_list'] = new sfWidgetFormChoice(array('choices' => $plan_choices, 'expanded' => true, 'multiple' => true));
    $this -> validatorSchema["coupon_to_hosting_plan_link_list"] -> setOption("required", true);

    $this -> validatorSchema["description"] -> setOption("required", false); //this description is optional to override auto-description

    $this -> widgetSchema["bar_association_id"] -> setOption("order_by", array("Name", "asc"));
    //$this -> widgetSchema["activation_date"] = new teWidgetFormJQueryDateTime();
    //$this -> widgetSchema["expiration_date"] = new teWidgetFormJQueryDateTime();

    $this -> widgetSchema -> setLabel("setup", "Setup Discount");
    $this -> widgetSchema -> setHelp("code", "code must be unique and will be treated case-insensitive");
    $this -> widgetSchema -> setHelp("description", "please enter a human readable description (will be displayed on client receipt!)");
    $this -> widgetSchema -> setHelp("setup", "(in percent) leave blank for no setup fee discount OR use 100 to eliminate the setup fee");
  }

  public function updateCodeColumn($code)
  {
    return strtoupper($code);
  }

}

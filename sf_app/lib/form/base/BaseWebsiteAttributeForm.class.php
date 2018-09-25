<?php

/**
 * WebsiteAttribute form base class.
 *
 * @method WebsiteAttribute getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWebsiteAttributeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'cg_code'                          => new sfWidgetFormInputText(),
      'rank'                             => new sfWidgetFormInputText(),
      'description'                      => new sfWidgetFormInputText(),
      'max_main_menu_pages'              => new sfWidgetFormInputText(),
      'max_emails'                       => new sfWidgetFormInputText(),
      'price'                            => new sfWidgetFormInputText(),
      'setup_price'                      => new sfWidgetFormInputText(),
      'status'                           => new sfWidgetFormInputText(),
      'includes_payment_page'            => new sfWidgetFormInputCheckbox(),
      'coupon_to_hosting_plan_link_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Coupon')),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'WebsiteAttribute', 'column' => 'id', 'required' => false)),
      'cg_code'                          => new sfValidatorString(array('max_length' => 255)),
      'rank'                             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'description'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'max_main_menu_pages'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'max_emails'                       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'price'                            => new sfValidatorNumber(array('required' => false)),
      'setup_price'                      => new sfValidatorNumber(array('required' => false)),
      'status'                           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'includes_payment_page'            => new sfValidatorBoolean(array('required' => false)),
      'coupon_to_hosting_plan_link_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Coupon', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'WebsiteAttribute', 'column' => array('cg_code')))
    );

    $this->widgetSchema->setNameFormat('website_attribute[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebsiteAttribute';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['coupon_to_hosting_plan_link_list']))
    {
      $values = array();
      foreach ($this->object->getCouponToHostingPlanLinks() as $obj)
      {
        $values[] = $obj->getCouponId();
      }

      $this->setDefault('coupon_to_hosting_plan_link_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCouponToHostingPlanLinkList($con);
  }

  public function saveCouponToHostingPlanLinkList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['coupon_to_hosting_plan_link_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, $this->object->getPrimaryKey());
    CouponToHostingPlanLinkPeer::doDelete($c, $con);

    $values = $this->getValue('coupon_to_hosting_plan_link_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CouponToHostingPlanLink();
        $obj->setHostingPlanId($this->object->getPrimaryKey());
        $obj->setCouponId($value);
        $obj->save();
      }
    }
  }

}

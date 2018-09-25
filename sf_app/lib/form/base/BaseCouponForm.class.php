<?php

/**
 * Coupon form base class.
 *
 * @method Coupon getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseCouponForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'code'                             => new sfWidgetFormInputText(),
      'status'                           => new sfWidgetFormInputText(),
      'description'                      => new sfWidgetFormTextarea(),
      'setup'                            => new sfWidgetFormInputText(),
      'current_usage'                    => new sfWidgetFormInputText(),
      'max_usage'                        => new sfWidgetFormInputText(),
      'bar_association_id'               => new sfWidgetFormPropelChoice(array('model' => 'BarAssociation', 'add_empty' => true)),
      'activation_date'                  => new sfWidgetFormDateTime(),
      'expiration_date'                  => new sfWidgetFormDateTime(),
      'created_at'                       => new sfWidgetFormDateTime(),
      'updated_at'                       => new sfWidgetFormDateTime(),
      'coupon_to_hosting_plan_link_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'WebsiteAttribute')),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'Coupon', 'column' => 'id', 'required' => false)),
      'code'                             => new sfValidatorString(array('max_length' => 255)),
      'status'                           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'description'                      => new sfValidatorString(),
      'setup'                            => new sfValidatorNumber(array('required' => false)),
      'current_usage'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'max_usage'                        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'bar_association_id'               => new sfValidatorPropelChoice(array('model' => 'BarAssociation', 'column' => 'id', 'required' => false)),
      'activation_date'                  => new sfValidatorDateTime(array('required' => false)),
      'expiration_date'                  => new sfValidatorDateTime(array('required' => false)),
      'created_at'                       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                       => new sfValidatorDateTime(array('required' => false)),
      'coupon_to_hosting_plan_link_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'WebsiteAttribute', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Coupon', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('coupon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Coupon';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['coupon_to_hosting_plan_link_list']))
    {
      $values = array();
      foreach ($this->object->getCouponToHostingPlanLinks() as $obj)
      {
        $values[] = $obj->getHostingPlanId();
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
    $c->add(CouponToHostingPlanLinkPeer::COUPON_ID, $this->object->getPrimaryKey());
    CouponToHostingPlanLinkPeer::doDelete($c, $con);

    $values = $this->getValue('coupon_to_hosting_plan_link_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CouponToHostingPlanLink();
        $obj->setCouponId($this->object->getPrimaryKey());
        $obj->setHostingPlanId($value);
        $obj->save();
      }
    }
  }

}

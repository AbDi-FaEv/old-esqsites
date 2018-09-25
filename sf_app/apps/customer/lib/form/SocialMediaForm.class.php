<?php
/**
 * Description of SocialMediaForm
 *
 * @author Richtermeister
 */
class SocialMediaForm extends BaseFormPropel
{
  public function setup()
  {
    $this -> setWidgets(array(
      "facebook" => new sfWidgetFormInput(),
      "twitter" => new sfWidgetFormInput(),
      "linked_in" => new sfWidgetFormInput(),
      "avvo" => new sfWidgetFormInput()
    ));

    $this -> setValidators(array(
      "facebook" => new sfValidatorString(array("required" => false)),
      "twitter" => new sfValidatorString(array("required" => false)),
      "linked_in" => new sfValidatorString(array("required" => false)),
      "avvo" => new sfValidatorString(array("required" => false))
    ));

    $this -> widgetSchema -> setNameFormat("social_media[%s]");
  }

  public function getModelName()
  {
    return 'Website';
  }

  protected function updateDefaultsFromObject()
  {
    $defaults = $this -> object -> getSocialMedia();
    $this->setDefaults($defaults);
  }

  public function updateObject($values = null)
  {
    if (is_null($values))
    {
      $values = $this->values;
    }

    $values = $this->processValues($values);
    $this -> object -> setSocialMedia($values);

    // embedded forms
    $this->updateObjectEmbeddedForms($values);

    return $this->object;
  }
}
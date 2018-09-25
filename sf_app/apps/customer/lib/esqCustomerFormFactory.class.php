<?php

/**
 * factory for providing widgets and validators that depend on customer-specific settings
 *
 * @author Richtermeister
 */
class esqCustomerFormFactory
{
  protected $skill_level;
  
  public function __construct(sfUser $user)
  {
    $this->skill_level = $user->getProfile()->getSkillLevel();
  }

  public function getRichTextEditor($options = array(), $attributes = array())
  {
    if($this->skill_level == 0)
    {
      $options = array_merge(array('jsoptions' => array('toolbar' => 'Basic')), $options);
    }

    return new sfWidgetFormCKEditor($options, $attributes);
  }

  public function getRichTextValidator($options = array(), $messages = array())
  {
    if($this->skill_level == 0)
    {
      $validator = new esqValidatorHtml($options, $messages);
    }
    else
    {
      $validator = new sfValidatorString($options, $messages);
    }

    return $validator;
  }
}
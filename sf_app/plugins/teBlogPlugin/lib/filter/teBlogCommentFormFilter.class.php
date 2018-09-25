<?php

/**
 * sfComment filter form.
 *
 * @package    sfPropelActAsCommentableBehaviorPlugin
 * @subpackage filter
 * @author     Xavier Lacot <xavier@lacot.org>
 * @see        http://www.symfony-project.org/plugins/sfPropelActAsCommentableBehaviorPlugin
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class teBlogCommentFormFilter extends BasesfCommentFormFilter
{
  public function configure()
  {
  	$status = sfPropelModerationBehavior::getStatuses();
  	unset($status[-1]);
  	$status = array_merge(array("" => " - Any Status"), $status);
  	
  	$this -> widgetSchema["moderation_status"] = new sfWidgetFormSelect(array("choices" => $status));
  	$this -> validatorSchema["moderation_status"] = new sfValidatorChoice(array("choices" => array_keys($status), "required" => false));
  }
  
  public function getFields()
  {
    $fields = parent::getFields();
    $fields["moderation_status"] = "ForeignKey";
    return $fields;
  }
  
  
}

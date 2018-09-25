<?php

/**
 * MemberFeedback filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class MemberFeedbackFormFilter extends BaseMemberFeedbackFormFilter
{
  public function configure()
  {
    $this -> widgetSchema["customer_id"] -> setOption("criteria", CustomerPeer::getActiveCriteria());
    $this -> widgetSchema["customer_id"] -> setOption("add_empty", true);
  }
}

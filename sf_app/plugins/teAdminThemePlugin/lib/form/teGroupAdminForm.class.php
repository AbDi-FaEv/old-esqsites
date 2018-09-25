<?php
/**
 * Description of teGroupAdminFormclass
 *
 * @author Richtermeister
 */
class teGroupAdminForm extends sfGuardGroupForm
{
  public function configure()
  {
    parent::configure();

    $this->widgetSchema['sf_guard_group_permission_list'] -> setOption('order_by', array("Title", "asc"));
    $this->widgetSchema['sf_guard_group_permission_list'] -> setOption('method', 'getTitle');
  }
}
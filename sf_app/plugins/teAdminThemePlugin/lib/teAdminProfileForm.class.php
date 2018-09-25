<?php
/**
 * Description of teAdminProfileForm
 *
 * @author Richtermeister
 */
class teAdminProfileForm extends teUserAdminForm
{
  public function configure()
  {
    parent::configure();
    unset($this["sf_guard_user_group_list"], $this["is_active"]);
  }
}
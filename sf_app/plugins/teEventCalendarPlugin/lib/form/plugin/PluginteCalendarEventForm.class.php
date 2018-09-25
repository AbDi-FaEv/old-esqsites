<?php

/**
 * teCalendarEvent form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PluginteCalendarEventForm extends BaseteCalendarEventForm
{
  protected function getUser()
  {
    if(($user = $this -> getOption("user")) && !$user instanceof sfUser)
    {
      throw new InvalidArgumentException("Expecting sfUser");
    }
    return $user;
  }

  public function configure()
  {
    unset($this["created_at"], $this["updated_at"], $this["created_by"], $this["updated_by"]);

    $user = $this -> getUser();

    if(!$user || !$user -> hasCredential("te_calendar_event_publish"))
    {
      unset($this["is_published"]);
    }

    $this -> widgetSchema["date"] = new sfWidgetFormJQueryDate();
    $this -> widgetSchema["description"] = new sfWidgetFormFCKEditor();
  }
}

<?php

/**
 * ClientMessage filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class ClientMessageFormFilter extends ClientMessageAdminFormFilter
{
  public function configure()
  {
    if((!$user = $this -> getOption("user")) || (!$user instanceof sfUser))
    {
      throw new InvalidArgumentException("You have to pass the current user object to the ClientMessageFormFilter");
    }

    if($user -> getProfile() -> countWebsites() > 1)
    {
      $c = $user -> getWebsitesCriteria();
      $this -> widgetSchema["website_id"] = new sfWidgetFormPropelChoice(array("add_empty" => "-- Either Website", "model" => "Website", "criteria" => $c));
    }
    else
    {
      unset($this["website_id"]); //only one website, we don't need to filter
    }
    unset($this["customer_id"]);
  }
}

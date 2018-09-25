<?php

class myUser extends sfBasicSecurityUser
{		
	public function signin(BarAssociation $bar_association, $trigger_login = true)
    {
      $this -> storage -> regenerate(true); //to make csrf protection trigger if user account changed (!important)
      $this -> getAttributeHolder() -> clear();

      $this -> setAuthenticated(true);
      $this -> setAttribute("id", $bar_association -> getId());

      if($trigger_login)
      {
        $bar_association -> setLastLogin(time()) -> save();
      }
    }

    public function signout()
    {
      $this -> setAuthenticated(false);
    }

    public function __toString()
	{
		return (string) $this -> getProfile();
	}

    /**
     * @return BarAssociation
     */
    public function getProfile()
    {
      return BarAssociationQuery::create() -> findPk($this -> getAttribute("id"));
    }
}

<?php

class teAdminThemeActions extends sfActions 
{

    public function executeError404()
    {
 		   	
    }

    public function executeSecure()
    {
      
    }
    
    public function executeUnavailable()
    {
    	
    }
    
    public function executeClearcache()
    {
    	$dir = sfConfig::get("sf_cache_dir");
    	sfToolKit::clearDirectory($dir);
    	$this -> getUser() -> setFlash("notice", "Cache Cleared");
    	$this -> redirect("@homepage");
    }

    public function executeUpdateProfile(sfWebRequest $request)
    {
      $this -> form = new teAdminProfileForm($this -> getUser() -> getGuardUser());
      if($request -> getMethod() == sfRequest::PUT)
      {
        //prevent user from updating other users profiles
        $this -> form -> bind(array_merge($request -> getParameter($this -> form -> getName()), array("id" => $this -> getUser() -> getId())));
        if($this -> form -> isValid())
        {
          $this -> form -> save();
          $this -> getUser() -> setFlash("notice", "Your profile has been updated successfully.");
          $this -> redirect("@homepage");
        }
      }
      else
      {
        //prevent user from updating other users profiles
        unset($this -> form["id"]);
      }
    }
}
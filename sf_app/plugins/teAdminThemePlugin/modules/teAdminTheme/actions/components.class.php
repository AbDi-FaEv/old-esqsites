<?php

class teAdminThemeComponents extends sfComponents 
{

    public function executeLoginHistory()
    {
    	$c = new Criteria();
	    $c -> add(sfGuardUserPeer::LAST_LOGIN, null, Criteria::ISNOTNULL);
	    $c -> addDescendingOrderByColumn(sfGuardUserPeer::LAST_LOGIN);
    	$this -> users = sfGuardUserPeer::doSelect($c);
    }

}
<?php

class myUser extends sfBasicSecurityUser
{

    protected $profile;

    public function getId()
    {
        return $this->getAttribute("user_id", null, 'sfGuardSecurityUser');
    }

    public function __toString()
    {
        return $this->getProfile()->getFullName();
    }

    public function hasAccessToPageType(PageContentDisplayType $type)
    {
        return $this->getCurrentWebsite()->getHostingPlan()->includesPageType($type);
    }

    public function getSalutation()
    {
        return $this->getProfile()->getFirstName() . " " . $this->getProfile()->getLastName();
    }

    /**
     * @return Customer
     */
    public function getProfile()
    {
        if (!isset($this->profile)) {
            $this->profile = CustomerPeer::retrieveByPk($this->getId());
        }
        return $this->profile;
    }

    /**
     * @return Website
     */
    public function getCurrentWebsite()
    {
        if (!$id = $this->getCurrentWebsiteId()) {
            //get first website we find for this customer
            $websites = $this->getProfile()->getWebsites();
            $id       = $websites[0]->getId();
            $this->setCurrentWebsiteId($id);
        }
        return WebsitePeer::retrieveByPk($id);
    }

    public function getCurrentWebsiteId()
    {
        return $this->getAttribute("current_website_id");
    }

    public function setCurrentWebsiteId($id)
    {
        $this->setAttribute("current_website_id", $id);
        $this->refresh();
    }

    public function setCurrentWebsite($website)
    {
        if ($website instanceof Website) {
            $website = $website->getId();
        }
        $this->setAttribute("current_website_id", $website);
        $this->refresh();
    }

    protected function refresh()
    {
        $this->setAttribute("userfiles_url", $this->getCurrentWebsite()->getUserfilesUrl());
    }

    public function getWebsitesCriteria()
    {
        $c = new Criteria();
        $c->add(WebsitePeer::CUSTOMER_ID, $this->getId());
        return $c;
    }

    public function signIn($user, $remember = false, $trigger_login = true, $con = null)
    {
        $this->storage->regenerate(true); //to make csrf protection trigger if user account changed (!important)
        $this->getAttributeHolder()->clear();

        $this->setAttribute('user_id', $user->getId(), 'sfGuardSecurityUser');
        $this->setAuthenticated(true);
        $this->refresh();

        if ($trigger_login) {
            $this->getProfile()->setLastLogin(time())->save();
        }

        // remember? DSG: Looks like a remember me functionality was started but never fully implemented/finished
        if ($remember) {

            $customer = CustomerQuery::create()->findOneById($this->getId());

            $rememberKey    = $customer->getRememberKey();
            
            $expiration_age = 15 * 24 * 3600;

            // generate new keys
            $key = $this->generateRandomKey();

            $con = Propel::getConnection(CustomerPeer::DATABASE_NAME);

            $sql  = "UPDATE esq_customers SET remember_key = :key WHERE id = :id";
            $stmt = $con->prepare($sql);
            $stmt->execute(array(
                ':key' => $key,
                ':id'  => $this->getId(),
            ));

            $customer->setRememberKey($key);
            $customer->save();
            
            sfContext::getInstance()->getResponse()->setCookie(sfConfig::get('app_remember_cookie'), $key, time() + $expiration_age);
        }
    }

    protected function generateRandomKey($len = 20)
    {
        $string = '';
        $pool   = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        for ($i = 1; $i <= $len; $i++) {
            $string .= substr($pool, rand(0, 61), 1);
        }
        return md5($string);
    }

}

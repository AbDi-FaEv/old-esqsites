<?php

/**
 * Custom filter class, since customers aren't using sfGuardPlugin
 */
class esqCustomerSecurityFilter extends sfBasicSecurityFilter
{

    public function execute($filterChain)
    {
        if ($this->isFirstCall() and !$this->getContext()->getUser()->isAuthenticated() && false) {
            $cookieName = sfConfig::get('app_remember_cookie');
            if ($cookie     = $this->context->getRequest()->getCookie($cookieName)) {
                $c  = new Criteria();
                
                $c->add(CustomerPeer::REMEMBER_KEY, $cookie);
                
                $rk = CustomerPeer::doSelectOne($c);
                if ($rk) {
//                    if($rk->getCustomer())
                    $this->getContext()->getUser()->signIn($rk, true);
                }
            }
        }
        parent::execute($filterChain);
    }

}

<?php

/**
 * index actions.
 *
 * @package    esqsites123
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class indexActions extends sfActions
{

    public function executeLogin(sfWebRequest $request)
    {

        $this->form = new CustomerLoginForm(array(), array(), false); //disabling csrf token to be able to log in via admin link
        if ($request->getMethod() == sfRequest::POST) {
            $this->form->bind($this->getRequestParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $values             = $this->form->getValues();
                $values["remember"] = isset($values["remember"]) ? $values["remember"] : false;

                $admin_login = preg_match("/admin\.php/", $request->getReferer()); //this come from cpanel?

                $this->getUser()->signin($values['customer'], $values["remember"], !$admin_login); //admins don't trigger logins
                return $this->redirect('@homepage');
            } else {
                $this->getUser()->setAuthenticated(false);
            }
        } else if ($this->getUser()->isAuthenticated()) {
            $this->redirect("@homepage");
        }
    }

    public function executeLogout()
    {
        sfContext::getInstance()->getResponse()->setCookie(sfConfig::get('app_remember_cookie'), '', time() - 2500);
        $this->getUser()->setAuthenticated(false);
        $this->redirect("@homepage");
    }

    public function executeError404()
    {
        
    }

    public function executeForgotPassword(sfWebRequest $request)
    {
        $this->form = new ForgotPasswordForm();
        if ($request->getMethod() == sfRequest::POST) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $customer = $this->form->getValue("username");
                $this->getMailer()->send(new PasswordEmail($customer));
                $this->setTemplate("passwordSent");
            }
        }
    }

}

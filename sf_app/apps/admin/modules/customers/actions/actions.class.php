<?php

require_once dirname(__FILE__).'/../lib/customersGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/customersGeneratorHelper.class.php';

/**
 * customers actions.
 *
 * @package    esqsites123
 * @subpackage customers
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class customersActions extends autoCustomersActions
{
  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);
    if(count($this -> pager) == 1)
    {
      $this->setFilters($this->configuration->getFilterDefaults()); //otherwise you can't get back to index page
      $this -> redirect("customer_show", $this -> pager -> getResults() -> getFirst());
    }
  }

  public function executeShow()
  {
    $this -> customer = $this -> getRoute() -> getCustomer();
    if($this -> customer -> isReal())
    {
      $this -> welcome_form = new ResendEmailForm($this -> customer);
    }
    $this -> getUser() -> rememberCustomer($this -> customer);
  }

  public function executeForgetRecent()
  {
    $this -> getUser() -> forgetCustomers();
    $this -> redirect("@customer");
  }

  public function executeResendWelcome(sfWebRequest $request)
  {
    $this -> customer = $this -> getRoute() -> getCustomer();
    $this -> welcome_form = new ResendEmailForm($this -> customer);

    if($request -> getMethod() == sfRequest::POST)
    {
      $this -> welcome_form -> bind($request -> getParameter($this -> welcome_form -> getName()));
      if($this -> welcome_form -> isValid())
      {
        $email_address = $this -> welcome_form -> getValue("email");
        $website = WebsiteQuery::create() -> findPk($this -> welcome_form -> getValue("website"));

        try
        {
          $email = new WelcomeEmail($website);
          $email -> setTo($email_address);
          $this -> getMailer() -> send($email);
          $this -> getUser() -> setFlash("notice", "Welcome Email Sent");
        }
        catch(Exception $e)
        {
          if(sfConfig::get("sf_debug"))
          {
            throw $e;
          }
          $this -> getUser() -> setFlash("error", "Couldn't Send Email");
        }
      }
      else
      {
        $this -> setTemplate("show");
        return sfView::SUCCESS;
      }
    }
    $this -> redirect("customer_show", $this -> customer);
  }

  public function executeShowInvoices()
  {
    try
    {
      sfOutputEscaper::markClassAsSafe("mbInvoiceCollection");
      $this -> invoices = ModernBillApi::getOutstandingInvoices();
    }
    catch(sfException $e)
    {
      return sfView::ERROR;
    }
  }

  public function executeCancel(sfWebRequest $request)
  {
    $this -> customer = $this -> getRoute() -> getCustomer();
    $this -> form = new CancellationForm();

    if($request -> getMethod() == sfRequest::POST)
    {
      $captcha = array(
        'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
        'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
      );
      $input = array_merge($request -> getParameter($this -> form -> getName()), array("captcha" => $captcha));

      $this -> form -> bind($input);
      if($this -> form -> isValid())
      {
        try
        {
          $this -> customer -> cancel();
          $this -> getUser() -> setFlash("notice", "Customer cancelled successfully");
        }
        catch(Exception $e)
        {
          $this -> getUser() -> setFlash("error", "Sorry, for some reason this customer couldn't be cancelled");
        }

        $this -> redirect("customer_show", $this -> customer);
      }
    }
  }

  public function executeAddCoupon(sfWebRequest $request)
  {
    $this -> customer = $this -> getRoute() -> getCustomer();
    $this -> form = new AddCouponForm(array(), array("customer" => $this -> customer));

    if($request -> getMethod() == sfRequest::POST)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $coupon = $this -> form -> getValue("code");
        $website = WebsiteQuery::create() -> findPk($this -> form -> getValue("website"));

        $website -> applyCoupon($coupon, $this -> form -> getValue("issue_discount")) -> save();

        //code indicates bar association?
        if($bar_association = $coupon -> getPotentialBarAssociation())
        {
          $this -> customer -> setBarAssociation($bar_association) -> save();
        }

        $this -> getUser() -> setFlash("notice", sprintf("Coupon \"%s\" applied to website \"%s\"", $coupon, $website));
        $this -> redirect("customer_show", $this -> customer);
      }
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $customer = $this -> getRoute() -> getCustomer();

    //only superadmins can delete real customers
    if($customer -> isReal() && !$this -> getUser() -> isSuperAdmin())
    {
      $this -> getUser() -> setFlash("error", "You can only delete shopping customers.");
      $this -> redirect("customer_show", $customer);
    }
    return parent::executeDelete($request);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $create = $form -> getObject() -> isNew();
      $customer = $form->save();
      if($create)
      {
        foreach($customer -> getWebsites() as $website)
        {
          $website -> resetPages();
          $website -> createDirectories();
          $website -> save();
        }
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $customer)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@customer_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'customer_show', 'sf_subject' => $customer));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
  
}

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
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeDownloads()
  {
  }

  public function executeMembers()
  {
    $this -> members = CustomerQuery::create() ->
      filterByBarAssociation($this -> getUser() -> getProfile()) ->
      filterByCreditBarAssociation(true) ->
      orderByCreatedAt('desc') ->
      find();
  }

  public function executeSignups()
  {
    $bar = $this -> getUser() -> getProfile();
    $this -> customers = $bar -> getCustomers();
  }

  public function executeSignupData()
  {
    $user = $this -> getUser();
    $bar = $user -> getProfile();
    $chart = new BarSignupChart($bar, $user -> getAttribute("chart_start"), $user -> getAttribute("chart_end"));

    $this -> getResponse()->setContentType('application/json');
    $this -> setLayout(false);

    return $this -> renderText($chart->getJson());
  }

  public function executeFilterChart(sfWebRequest $request)
  {
    $chart = new BarSignupChart($this -> getUser() -> getProfile());
    $form = new DateRangeFilter(array(), array("start" => $chart -> getStartDate()));
    if($params = $request -> getParameter($form -> getName()))
    {
      $form -> bind($params);
      if($form -> isValid())
      {
        $this -> getUser() -> setAttribute("chart_start", $form -> getValue("start"));
        $this -> getUser() -> setAttribute("chart_end", $form -> getValue("end"));
      }
    }
    else
    {
      $this -> getUser() -> setAttribute("chart_start", null);
      $this -> getUser() -> setAttribute("chart_end", null);
    }
    $this -> redirect("@homepage");
  }

  public function executeRevenue()
  {
    $this -> association = $this -> getUser() -> getProfile();
    $this -> plans = HostingPlanQuery::create() ->
      withNumUsed(true) ->
      filterByBarAssociation($this -> association) ->
      find();

    $this -> total = $this -> association -> getNumCustomers(true);
    $this -> levels = BarAssociation::getRevenueLevels();
  }
  
  public function executeUpdateAccount(sfWebRequest $request)
  {
  	$this -> form = new BarAssociationBarForm($this -> getUser() -> getProfile());
    $this -> bar = $this -> getUser() -> getProfile();

    if($request -> isMethod(sfRequest::PUT))
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()), $request -> getFiles($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $bar = $this -> form -> save();

        if($file = $this -> form -> getValue("logo"))
        {
          $file -> save(); //have to save it to get it a proper filename

          //email logo
          $email = Swift_Message::newInstance() ->
            setTo("Nexyz9@gmail.com") ->
            setSubject("New ESQ Bar Association Logo Submission") ->
            setFrom(array('info@esqsites123.com' => (string) $this -> bar)) ->
            attach(Swift_Attachment::fromPath($file -> getSavedName()));

          $this -> getMailer() -> send($email);
          unlink($file -> getSavedName());
        }

        $this -> getUser() -> setFlash("notice", "Account Info updated successfully.");
        $this -> redirect("@homepage");
      }
    }
  }

  public function executeLogin(sfWebRequest $request)
  {

    $this -> form = new teLoginForm(array(), array("validator_options" => array("model" => "BarAssociation", "username_field" => "abbreviation")), false); //disabling csrf token to be able to log in via admin link
    if($request -> getMethod() == sfRequest::POST)
    {
      $this -> form -> bind($this -> getRequestParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $bar_association = $this->form->getValue("user");
        $admin_login = preg_match("/admin\.php/", $request -> getReferer()); //this come from cpanel?
        $this -> getUser() -> signin($bar_association, !$admin_login);

        return $this->redirect('@homepage');
      }
      else
      {
        $this -> getUser() -> setAuthenticated(false);
      }
    }
    else if($this -> getUser() -> isAuthenticated())
    {
      $this -> redirect("@homepage");
    }
  }

  public function executeLogout()
  {
    $this -> getUser() -> setAuthenticated(false);
    $this -> redirect("@homepage");
  }
}

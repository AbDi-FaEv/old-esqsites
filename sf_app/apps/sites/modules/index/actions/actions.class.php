<?php

/**
 * index actions.
 *
 * @package    esqsites123
 * @subpackage index
 * @author     Richtermeister
 */
class indexActions extends sfActions
{
  public function preExecute()
  {
    $this -> getRequest() -> setRequestFormat('html'); //ensure we only handle html, rss breaks things
  }

  /**
   * responsible for handling a page request within the customer CMS
   *
   * @param sfWebRequest $request
   */
  public function executeShowPage(sfWebRequest $request)
  {

    $website = $this -> getRoute() -> getWebsite();
    if($request -> getParameter("preview"))
    {
      $preview_website = WebsitePeer::retrievePreviewWebsite();
      $website = $this -> mergeWebsiteInfo($preview_website, $website);
      $this -> getRoute() -> setWebsite($website);
    }
    elseif($website -> getCustomer() -> getStatus() != Customer::STATUS_ACTIVE) //no point in going on otherwise
    {
      $this -> forward($this -> getModuleName(), "inactive");
    }

    try
    {
      $page = $this -> getRoute() -> getRequestedPage();
    }
    catch(sfError404Exception $e)
    {
      if(!$page = $website -> get404Page())
      {
        $this -> dispatcher -> notify(new sfEvent($this, "esq.log", array("message" => "404 page not found for website ".$website -> getId())));
        $this -> forward404();
      }
      $this -> getResponse() -> setStatusCode(404);
    }

    $page = esqPageDecorator::decorate($page); //provides easier access to content & form handling
    
    //form handling comes first! (before body evaluation)
    if($request -> getMethod() == sfRequest::POST) //form submitted
    {
      $page -> handleFormSubmissions($request, $this);
    }
    
    $body = $this -> getPartial("content", array("page" => $page));
    $page -> setBody($body);

    $this -> handleAnalytics($website);
    $this -> handleMetas($page);
    //$this -> handleAssets($page);

    if($reference = $request -> getParameter("template")) //for demo!
    {
      $template = WebsiteTemplateQuery::create() -> findOneByReference($reference);
      $this ->forward404Unless($template);
      $website->setWebsiteTemplate($template);
    }
    else
    {
      $template = $website -> getTemplate();
    }

    //get template engine
    $template_engine = esqContainer::getInstance() -> getTemplateEngine($template);
    $template_file = $page -> getTemplateFile();
    
    //wrap template
    $template = new esqTemplateDecorator($template, $website);

    if($theme = $request->getParameter('theme'))
    {
      $template->getConfiguration()->setTheme($theme);
    }

    //vars available to template
    $vars = array(
        "page" => $page,
        "website" => new esqWebsiteDecorator($website),
        "template" => $template
        );

    try
    {
      $content = $template_engine -> loadTemplate($template_file) -> render($vars);
      //$content = $template -> applyCustomizations($content); //css, etc.
      if(sfConfig::get("app_filter_output"))
      {
        $content = $this -> filterOutput($content); //image resize, links, etc
      }
      $this -> getResponse() -> setContent($content);
    }
    catch(Twig_Sandbox_SecurityError $e)
    {
      //implement a safety harness to guide customers through mistakes
      throw $e;
    }
    
    return sfView::NONE;
  }

  /**
   * applies customizations to raw html before output
   *
   * @param string $html
   * @return string
   */
  protected function filterOutput($html)
  {
    //content filter setup
    sfConfig::set('app_sfThumbnail_thumbnails_dir', 'userFiles/thumbnails');
    $this -> getContext() -> getConfiguration() -> loadHelpers(array("sfThumbnail"), $this -> getContext() -> getModuleName());

    $filter = sfContentFilterParser::createInstance();
    $html = $filter -> filter($html, array("image", "url")); //resize images and link url's

    return $html;
  }

  /**
   * apply page-specific meta settings to response
   * 
   * @param IPage $page
   */
  public function handleMetas(IPage $page)
  {
    /* @var $response sfWebResponse */
    $response = $this -> getResponse();

    if(!$meta_description = $page -> getMetaDescription())
    {
      $meta_description = $page -> getWebsite() -> getMetaDescription();
    }

    if(!$meta_keywords = $page -> getMetaKeywords())
    {
      $meta_keywords = $page -> getWebsite() -> getMetaKeywords();
    }

    $response -> setTitle($page -> getWebsite() -> getFirmName());

    if($page -> getMetaTitle())
    {
      $response -> setTitle($page -> getMetaTitle());
    }
    elseif($page -> getTitle())
    {
      $response -> setTitle($page -> getTitle());
    }

    $response -> addMeta("keywords", $meta_keywords);
    $response -> addMeta("description", $meta_description);
  }

  /**
   * @todo implement this
   * @param IPage $page
   */
  public function handleAssets(IPage $page)
  {
    $response = $this -> getResponse();
  }

  public function executeInactive(sfWebRequest $request)
  {
    //pass through
  }

  /**
   * adds analytics code to the response
   * 
   * @param Website $website the website that contains the analytics settings
   */
  protected function handleAnalytics(Website $website)
  {
    if($code = $website -> getAnalyticsCode())
    {
      $tracker = $this -> getTracker();
      $tracker -> setEnabled(true);
      $tracker -> setProfileId($code);
    }
  }

  public function handleFormSubmission(sfForm $form, $page)
  {
    $recipients = $page -> getNotificationEmails();

    $case = $form -> save(); //we save this in any case (avoid potential for causing damages)
    $case -> setWebsite($page -> getWebsite());
    $case -> setDomain($this -> getRequest() -> getHost());
    $case -> setSubmittedByIp($this -> getRequest() -> getRemoteAddress());
    $case -> setSubmittedByUserAgent($this -> getRequest() -> getHttpHeader('User-Agent'));
    $case -> save(); //update

    //spam handling
    try
    {
      $spam_api = esqContainer::getInstance() -> getSpamService() -> 
        setSiteUrl($this -> getRequest() -> getHost()) ->
        setApiHost(SpamCheckerApi::HOST_TYPEPAD);

      if(sfConfig::get("sf_debug"))
      {
        $spam_api -> setEventDispatcher($this -> dispatcher);
      }

      $case -> setIsSpam($spam_api -> messageIsSpam($case)) -> save();
      if($case -> getIsSpam())
      {
        $case -> delete();
        return; //don't email client
      }
    }
    catch(Exception $e)
    {
      //error during spam check - just move on in prod
      if(sfConfig::get("sf_debug")) throw $e;
    }

    if($page -> getNotificationType() == ClientMessage::SEND_TYPE_MESSAGE_NO_STORE)
    {
      $case -> delete(); //not stored "officially"
    }

    if($page -> getNotificationType() != ClientMessage::SEND_TYPE_STORE)
    {
      try
      {
        $email = new CaseSubmissionEmail($case, $page -> getNotificationType());
        $email -> setTo($recipients);
        $this -> getMailer() -> send($email);
      }
      catch(Exception $e)
      {
        //message not delivered
        $this -> logMessage("Email sending failed", 'err');
      }
    }
  }

  /**
   * used by preview to merge selective content into existing website
   *
   * @param Website $a
   * @param Website $b
   * @return Website
   */
  protected function mergeWebsiteInfo(Website $a, Website $b)
  {
    $fields = $b -> toArray(BasePeer::TYPE_FIELDNAME);
    unset($fields["id"]);
    if($fields["template_id"] == null)
    {
      unset($fields["template_id"]);
    }
    $a -> fromArray($fields, BasePeer::TYPE_FIELDNAME);
    return $a;
  }

}

<?php
/**
 * wraps a page to provide useful helper methods for access in templates
 *
 * @author Richtermeister
 */
class esqPageDecorator extends esqBaseDecorator implements IPage
{
  protected $page;
  protected $body;
  protected static $form_classes = array("case_submission" => "ClientMessageForm");
  protected $forms;
  protected $form_messages;

  /**
   * constructor
   *
   * @param Page $page
   * @param string $body
   */
  public function __construct(Page $page, $body = null)
  {
    $this -> page = $page;
    $this -> body = $body;

    parent::__construct($page);
  }

  public function __toString()
  {
    return (string) $this -> page;
  }

  /**
   * returns the body content
   *
   * @return string
   */
  public function getBody()
  {
    return $this -> body;
  }

  /**
   * sets the body content for this page
   * this is really a helper method while the templates don't render their own body content
   *
   * @param string $body
   * @return esqPageDecorator
   */
  public function setBody($body)
  {
    $this -> body = $body;
    return $this;
  }

  /**
   * factory method to decorate a page based on its content display type
   *
   * @param Page $page
   * @return esqPageDecorator
   */
  public static function decorate(Page $page)
  {
    switch($page -> getPageContentDisplayTypeId())
    {
      case Page::DISPLAY_TYPE_BLANK:
        $page = new esqPageBlank($page);
      break;
      case Page::DISPLAY_TYPE_LINKS:
        $page = new esqPageLinks($page);
      break;
      case Page::DISPLAY_TYPE_PAYMENT:
        $page = new esqPagePayment($page);
      break;
      case Page::DISPLAY_TYPE_MAP:
        $page = new esqPageMap($page);
      break;
      case Page::DISPLAY_TYPE_GROUPED_WITH_LINKS:
      case Page::DISPLAY_TYPE_GROUPED:
        $page = new esqPageGroupedEntries($page);
      break;
      case Page::DISPLAY_TYPE_CASE_SUBMIT:
        $page = new esqPageCaseSubmit($page);
      break;
      default:
        $page = new esqPageBlank($page);
      break;
    }
    return $page;
  }

  /**
   * handles form submissions
   *
   * @todo figure out which form was submitted - right now no issue, only one form available
   * @param sfRequest $request
   * @param sfAction $action
   */
  public function handleFormSubmissions(sfRequest $request, sfAction $action)
  {
    $form_type = "case_submission";

    $form = $this -> getForm($form_type);
    $captcha = array(
      'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
      'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
    );
    $input = array_merge($request -> getParameter($form -> getName()), array("captcha" => $captcha));
    $form -> bind($input);
    if($form -> isValid())
    {
      $this -> form_messages[$form_type] = $action -> handleFormSubmission($form, $this);//delegate form submission back to action (better place to send emails etc..)
    }
  }

  /**
   * return the specified form
   * 
   * @param string $which
   * @return sfForm
   */
  public function getForm($which)
  {
    if(!isset($this -> forms[$which]))
    {
      if(!isset(self::$form_classes[$which]))
      {
        throw new InvalidArgumentException("Form class for ".$which." is not defined.");
      }
      $class = self::$form_classes[$which];
      $this -> forms[$which] = new $class();
    }
    return $this -> forms[$which];
  }

  /**
   * returns a message associated with a form (error message for example)
   *
   * @param string $form
   * @param string $default
   * @return string
   */
  public function getFormMessage($form, $default = null)
  {
    return isset($this -> form_messages[$form]) ? $this -> form_messages[$form] : $default;
  }
}
<?php

/**
 * collects info for page creation / update
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageForm extends PageAdminForm
{
  /**
   * @todo consider moving help info viewable form plugin
   * @todo validate multiple emails
   */
  public function configure()
  {
    if(!$user = $this -> getOption("user"))
    {
      throw new sfException("You have to pass the current user object");
    }
    
    if(!$factory = $this -> getOption("factory"))
    {
      throw new sfException("You have to pass a form factory");
    }

    parent::configure();
    
    unset(
    $this["website_id"], 
    $this["menu_type"], 
    $this["status"], 
    $this["meta_content"]); //legacy, split into keywords etc -> can be removed eventually

    if(!$this -> object -> isNew())
    {
      unset($this["page_content_display_type_id"]);
    }
    else
    {
      //set some neccessities
      $this -> object -> setWebsiteId($user -> getCurrentWebsiteId());

      //limit available page types
      $website = $user -> getCurrentWebsite();

      if(!$website -> getHostingPlan() -> getIncludesPaymentPage())
      {
        $this -> widgetSchema["page_content_display_type_id"] -> getOption("criteria") -> filterById(Page::DISPLAY_TYPE_PAYMENT, Criteria::NOT_EQUAL);
      }
    }

    //ensure url doesn't contain special characters
    $this -> validatorSchema["url"] = new sfValidatorRegex(
      array(
        "pattern" => '/^([a-z]|[A-Z]|[0-9]|\.|_|-)*$/', "required" => false),
      array("invalid" => "The URL may only contain characters: a-z, 0-9, underscores, periods and hyphens (no spaces)."));

    $this -> widgetSchema -> setHelp("page_content_display_type_id", "The page type determines the layout and functionality of the page.");
    $this -> widgetSchema -> setHelp("title", "The page title appears at the top of each web page that lets your clients know which page are currently viewing.");
    $this -> widgetSchema -> setHelp("url", "(optional) The name of this webpage as it appears in the address bar of your web browser. Leave empty to auto-generate from page title.");
    $this -> widgetSchema -> setHelp("link_name", "(optional) The name of this webpage as it appears in the menu of your website. Leave empty to auto-generate from page title.");
    $this -> widgetSchema -> setHelp("meta_title", "Your Meta Title appears at the header or very top of your internet browser window, and may also appear as “colored link” on an internet search results page.");
    

    //configuring the embedded forms below
    foreach($this -> object -> getPageGroupsJoinPageEntries() as $key => $page_group)
    {
      $name = "group_".$key;
      switch($this -> object -> getPageContentDisplayTypeId())
      {
        case Page::DISPLAY_TYPE_BLANK: //clean page
          $this -> embedForm($name, new PageGroupBlankForm($page_group, array('factory' => $factory)));
        break;
        case Page::DISPLAY_TYPE_MAP: //map
          $this -> embedForm($name, new PageGroupMapForm($page_group, array('factory' => $factory)));
        break;
        case Page::DISPLAY_TYPE_CASE_SUBMIT:  //case submit
          $this -> embedForm($name, new PageGroupForm($page_group, array('factory' => $factory)));
        break;
        case Page::DISPLAY_TYPE_PAYMENT: //payment page
          $this -> embedForm($name, new PageGroupPaymentForm($page_group, array('factory' => $factory)));
        break;
      }
    }

    switch($this -> object -> getPageContentDisplayTypeId())
    {
      case Page::DISPLAY_TYPE_CASE_SUBMIT: //case submit

        //customize sent type
        $group_form = $this -> embeddedForms["group_2"];
        $forms = $group_form -> getEmbeddedForms();
        $entry = $forms["entry_0"];
        $entry -> setWidget("data", new sfWidgetFormChoice(
          array("choices" => ClientMessage::getSendTypes(),
            "label" => "How do you want your messages to be sent?",
            "expanded" => true
          )));
        $group_form -> embedForm("entry_0", $entry);
        $this -> embedForm("group_2", $group_form);

        //customize pre message
        $group_form = $this -> embeddedForms["group_0"];
        $forms = $group_form -> getEmbeddedForms();
        $entry = $forms["entry_0"];
        $entry -> setWidget("data", $factory->getRichTextEditor(array("label" => "Message"), array("rows" => 30, "cols" => 60)));
        $entry -> setValidator("data", $factory->getRichTextValidator(array('required' => false)));
        $entry -> getWidgetSchema() -> setHelp("data", "this message will appear above the submit a case form");

        $group_form -> embedForm("entry_0", $entry);
        $this -> embedForm("group_0", $group_form);

        //customize emails
        $group_form = $this -> embeddedForms["group_1"];
        $forms = $group_form -> getEmbeddedForms();
        $entry = $forms["entry_0"];
        $entry -> setWidget("data", new sfWidgetFormTextarea());
        $entry -> getWidgetSchema() -> setLabel("data", "Email Recipient(s)");
        $entry -> getWidgetSchema() -> setHelp("data", "these email(s) will be used to notify you about new messages. Please separate individual emails by comma or place them on separate lines.");

        $group_form -> embedForm("entry_0", $entry);
        $this -> embedForm("group_1", $group_form);
         
      break;

    } 
  } 
}
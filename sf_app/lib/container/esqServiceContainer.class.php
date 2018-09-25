<?php
/**
 *
 * @author Richtermeister
 */
class esqServiceContainer extends esqBaseServiceContainer
{
  /**
   * @return esqCheddarGetterClient
   */
  public function getSubscriptionService()
  {
    return $this -> getService("cg.api");
  }

  /**
   * @return Twig_Environment
   */
  public function getTemplateEngine($template = null)
  {
    $template_engine = $this -> getService('template.engine');
    if($template)
    {
      $template_engine -> getLoader() -> configureForTemplate($template);
    }
    return $template_engine;
  }

  /**
   * @return iContactService
   */
  public function getMailingListService()
  {
    return $this -> getService('icontact.api');
  }

  /**
   * @return esqSpamCheckerApi
   */
  public function getSpamService()
  {
    return $this -> getService('spam.api');
  }
}
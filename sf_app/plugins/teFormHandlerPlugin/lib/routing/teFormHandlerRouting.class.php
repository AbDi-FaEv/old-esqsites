<?php

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Daniel Richter
 */
class teFormHandlerRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function addAdminRoutes(sfEvent $event)
  {

    $event->getSubject()->prependRoute('te_form_submission_admin', new sfPropelRouteCollection(array(
      'name'                 => 'te_form_submission_admin',
      'model'                => 'teFormSubmission',
      'module'               => 'teFormSubmissionAdmin',
      'prefix_path'          => '/forms',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
	    'collection_actions'	 => array('export' => 'GET')
    )));

  }

  public static function addFrontRoutes(sfEvent $event)
  {

    $event->getSubject()->prependRoute('te_form_handler',
      new sfRoute("/forms/:form",
        array("module" => "teFormHandler", "action" => "handleForm") //defaults
      ));

    $event->getSubject()->connect('te_cms_form_handler',
      new sfPropelRoute("/:absolute_url",
        array("module" => "teFormHandler", "action" => "handleCmsForm", "absolute_url" => ""), //defaults
        array("absolute_url" => ".*", "sf_method" => "post"),  //requirements
        array("model" => "teCmsPage", "type" => "object", "method" => "getPageForRoute") //options
      ));

  }
}
<?php

/**
 *
 * @package    teTestimonialRouting
 * @subpackage plugin
 * @author     Daniel Richter
 */
class teTestimonialRouting
{

  static public function addRouteForAdmin(sfEvent $event)
  {

    $event->getSubject()->prependRoute('te_testimonial_admin', new sfPropelRouteCollection(array(
      'name'                 => 'te_testimonial_admin',
      'model'                => 'teTestimonial',
      'module'               => 'teTestimonialAdmin',
      'prefix_path'          => 'testimonials', //make this configurable?
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));

  }
    
}

<?php
/**
 * Description of components
 *
 * @author Richtermeister
 */
class indexComponents extends sfComponents
{
  public function executeMiniGallery()
  {
    $this -> templates = WebsiteTemplateQuery::create() ->filterByHeros() -> find();
  }

  public function executeQuote()
  {
    $this -> quote = teTestimonialPeer::getRandom();
  }
}
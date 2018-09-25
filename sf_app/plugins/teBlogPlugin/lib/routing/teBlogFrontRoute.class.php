<?php
/**
 * custom route class to use front query
 *
 * @author Richtermeister
 */
class teBlogFrontRoute extends sfPropel15Route
{
  protected function getQuery()
  {
    $query = parent::getQuery();
    return teBlogPostFrontQuery::create(null, $query);
  }
}
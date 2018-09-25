<?php
/**
 * Description of teBlogPostFrontQuery
 *
 * @author Richtermeister
 */
class teBlogPostFrontQuery extends teBlogPostQuery
{
  public function __construct($dbName = 'propel', $modelName = 'teBlogPost', $modelAlias = null)
  {
      parent::__construct($dbName, $modelName, $modelAlias);
      $this -> filterByIsPublished(true) -> filterByPublishedAt(array("max" => time()));
  }

  public static function create($modelAlias = null, $criteria = null)
  {
      if ($criteria instanceof teBlogPostFrontQuery) {
          return $criteria;
      }
      $query = new teBlogPostFrontQuery();
      if (null !== $modelAlias) {
          $query->setModelAlias($modelAlias);
      }
      if ($criteria instanceof Criteria) {
          $query->mergeWith($criteria);
      }
      return $query;
  }
}
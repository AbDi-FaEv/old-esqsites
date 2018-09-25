<?php

class teBlogPostPeer extends BaseteBlogPostPeer
{
  public static function getArchiveEntries()
  {
    $query = sprintf("
      SELECT
        YEAR(%s) AS year,
        MONTH(%s) AS month,
        COUNT(%s) AS num
      FROM
        %s
      WHERE %s = 1
      GROUP BY year, month
      ORDER BY
        year DESC, month DESC
      ",
      self::PUBLISHED_AT,
      self::PUBLISHED_AT,
      self::ID,
      self::TABLE_NAME,
      self::IS_PUBLISHED);

    $con = Propel::getConnection();
    $statement = $con -> prepare($query);
    $statement -> execute();
    return $statement -> fetchAll();
  }	
}

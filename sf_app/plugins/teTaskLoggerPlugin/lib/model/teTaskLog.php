<?php


/**
 * Skeleton subclass for representing a row from the 'te_task_logs' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.teTaskLoggerPlugin.lib.model
 */
class teTaskLog extends BaseteTaskLog
{
  const STATUS_SUCCESS  = 'success';
  const STATUS_ERROR    = 'error';

  protected static $status_choices = array(self::STATUS_SUCCESS => "Success", self::STATUS_ERROR => "Error");

  public static function getStatusChoices()
  {
    return self::$status_choices;
  }

  public static function getNameChoices()
  {
    $c = new Criteria();
    $c -> addSelectColumn(teTaskLogPeer::TASK_NAME) -> setDistinct(true);
    $result = BasePeer::doSelect($c);
    $choices = $result -> fetchAll(PDO::FETCH_COLUMN);
    //consider putting counts in here
    return array_combine($choices, $choices);
  }
}

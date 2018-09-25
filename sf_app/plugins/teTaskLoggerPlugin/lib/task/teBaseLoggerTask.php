<?php
/**
 * Description of teBaseLogger
 *
 * @author Richtermeister
 */
abstract class teBaseLoggerTask extends sfBaseTask
{
  protected $log = array();
  protected $summarize = false;

  public function logSection($section, $message, $size = null, $style = 'INFO')
  {
    $this -> addLog($section."\t".$message);
    parent::logSection($section, $message, $size, $style);
  }

  public function logBlock($messages, $style)
  {
    $this -> addLog($messages);
    parent::logBlock($messages, $style);
  }

  protected function addLog($message)
  {
    $this -> log[] = $message;
    if($this -> summarize)
    {
      $this -> task -> setSummary($message);
      $this -> summarize = false;
    }
  }

  public function summarize($summary = null, $success = true)
  {
    if($summary == null)
    {
      $this -> summarize = true;
    }
    else
    {
      $this -> task -> setSummary($summary);
      $this -> summarize = false;
    }

    if(!$success)
    {
      $this -> task -> setStatus(teTaskLog::STATUS_ERROR);
    }

    return $this;
  }

  protected function doRun(sfCommandManager $commandManager, $options)
  {

    $this -> task = new teTaskLog();
    $this -> task -> setTaskName($this -> name);

    $this -> task -> setArguments($this -> formatParameters($commandManager -> getArgumentValues()));
    $this -> task -> setOptions($this -> formatParameters($commandManager -> getOptionValues(), "--"));

    try
    {
      parent::doRun($commandManager, $options);
    }
    catch(Exception $e)
    {
      if($this -> configuration) //this means we didn't just have an argument error
      {
        //this can probably be refactored into its own method
        $databaseManager = new sfDatabaseManager($this->configuration); //make sure we have db connection
        $this -> saveLog();
        $this -> task -> setSummary($e -> getMessage()) -> setStatus(teTaskLog::STATUS_ERROR) -> save();
      }
      throw $e;
    }

    if(!$this -> task -> getStatus())
    {
      $this -> task -> setStatus(teTaskLog::STATUS_SUCCESS); //default = all is good
    }

    $this -> saveLog();
    $databaseManager = new sfDatabaseManager($this->configuration); //make sure we have db connection
    $this -> task -> save();

    //email?
  }

  protected function saveLog()
  {
    // Init the log file associated to the task
    $file[] = sfConfig::get('sf_log_dir');
    $file[] = 'tasks';
    $file[] = $this->getNamespace();
    $file[] = $this->getName();
    $file[] = str_replace(':', '-', $this->getFullName())."_".time().".log";
    $file = implode(DIRECTORY_SEPARATOR, $file);

    $this -> getFileSystem() -> mkdirs(dirname($file));
    $this -> getFileSystem() -> touch($file); //this logs the file to the screen

    file_put_contents($file, implode(PHP_EOL, $this -> log));

    $this -> task -> setLogFile(str_replace(sfConfig::get('sf_root_dir'), "", $file));
  }

  protected function formatParameters($params, $prefix = null, $glue = " ")
  {
    foreach($params as $key => $value)
    {
      if($value && ($key != 'task'))
      {
        $pairs[] = $prefix.$key."=".$value;
      }
    }
    return isset($pairs) ? implode($glue, $pairs) : null;
  }
}
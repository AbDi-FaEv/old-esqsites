<?php
/**
 * Description of esqLogger
 *
 * @author Richtermeister
 */
class esqLogger extends sfFileLogger
{
  public function initialize(sfEventDispatcher $dispatcher, $options = array())
  {
    $options["format"] = '%time% %message%%EOL%'; //logging with custom format
    parent::initialize($dispatcher, $options);
    $dispatcher -> disconnect('application.log', array($this, 'listenToLogEvent'));
    $dispatcher -> connect('esq.log', array($this, 'listenToLogEvent'));
  }
}
<?php
/**
 * Description of teTaskLoggerRouting
 *
 * @author Richtermeister
 */
class teTaskLoggerRouting
{
  static public function addRoute(sfEvent $event)
  {
    $event->getSubject()->prependRoute('te_task_log', new sfPropelRouteCollection(array(
      'name'                 => 'te_task_log',
      'model'                => 'teTaskLog',
      'module'               => 'teTaskLogs',
      'prefix_path'          => 'tasks/logs',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }
}
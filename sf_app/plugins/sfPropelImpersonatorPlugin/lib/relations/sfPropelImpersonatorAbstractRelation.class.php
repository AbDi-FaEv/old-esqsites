<?php
abstract class sfPropelImpersonatorAbstractRelation
{
  protected $from;
  protected $to;
  protected $iFrom;
  protected $iTo;
  protected $local;
  protected $distant;
  protected $parameters;

  abstract public function link(array &$rowObjects, $isNewObject);

  public function __construct($index, $from, $fromIdx, $to, $toIdx, $local, $distant, array $parameters)
  {
    $this->index      = $index;
    $this->from       = $from;
    $this->iFrom      = $fromIdx;
    $this->to         = $to;
    $this->iTo        = $toIdx;
    $this->local      = $local;
    $this->distant    = $distant;
    $this->parameters = $parameters;
  }

  public function getParameter($scope, $name, $default=null)
  {
    return isset($this->parameters[$scope][$name])?$this->parameters[$scope][$name]:$default;
  }

  /**
   * Checks whether a primary key is consistent or not. Used to know if an object retrieved via a
   * left/right join (or equivalent) was null or not.
   *
   * @param mixed $key
   *
   * @return boolean
   */
  protected function testConsistence($key)
  {
    $isConsistent = true;

    if (is_array($key))
    {
      foreach ($key as $key_part)
      {
        $isConsistent = $isConsistent && $this->testConsistence($key_part);
      }
    }
    elseif ($key === null)
    {
      $isConsistent = false;
    }

    return $isConsistent;
  }
}
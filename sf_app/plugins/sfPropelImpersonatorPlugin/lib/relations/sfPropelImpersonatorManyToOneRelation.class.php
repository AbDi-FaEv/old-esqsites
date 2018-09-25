<?php
class sfPropelImpersonatorManyToOneRelation extends sfPropelImpersonatorAbstractRelation
{
  public function link(array &$rowObjects, $isNewObject)
  {
    $foreignClass  = $this->from;
    $foreignObject = $rowObjects[$this->iFrom];
    $currentObject = $rowObjects[$this->iTo];

    $relatedBy = (null===($_relatedBy=$this->getParameter('from', 'related_by')))?'':'RelatedBy'.sfInflector::camelize($_relatedBy);

    if ($this->testConsistence($rowObjects[$this->index]->getPrimaryKey()))
    {
      if ($isNewObject)
      {
        $currentObject->{'init'.$foreignClass.'s'.$relatedBy}();
      }

      $currentObject->{'add'.$foreignClass.$relatedBy}($foreignObject);
      $foreignObject->{'set'.$this->to.$relatedBy}($rowObjects[$this->index]);
    }

    return true;
  }
}
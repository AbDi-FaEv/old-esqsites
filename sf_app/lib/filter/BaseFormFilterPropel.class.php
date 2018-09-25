<?php

/**
 * Project filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFormFilterPropel extends sfFormFilterPropel
{
  public function setup()
  {
  }

  protected function addTextCriteria(Criteria $criteria, $field, $values)
  {
    $colname = $this->getColname($field);

    if (is_array($values) && isset($values['is_empty']) && $values['is_empty'])
    {
      $criterion = $criteria->getNewCriterion($colname, '');
      $criterion->addOr($criteria->getNewCriterion($colname, null, Criteria::ISNULL));
      $criteria->add($criterion);
    }
    else if (is_array($values) && isset($values["is_not_empty"]) && $values["is_not_empty"])
    {
      $criterion = $criteria->getNewCriterion($colname, '', Criteria::NOT_EQUAL);
      $criterion->addAnd($criteria->getNewCriterion($colname, null, Criteria::ISNOTNULL));
      $criteria->add($criterion);
    }
    else if (is_array($values) && isset($values['text']) && '' != $values['text'])
    {
      $criteria->add($colname, '%'.$values['text'].'%', Criteria::LIKE);
    }
    else if (is_scalar($values) && '' != $values)
    {
      $criteria->add($colname, '%'.$values.'%', Criteria::LIKE);
    }
  }
}

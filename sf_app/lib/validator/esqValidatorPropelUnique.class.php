<?php
/**
 * This validator is a custom variation of the regular propel unique validator,
 * in order to pass a custom criteria object
 *
 * @author Richtermeister
 */
class esqValidatorPropelUnique extends sfValidatorPropelUnique
{
  protected function configure($options = array(), $messages = array())
  {
    $this -> addOption('criteria', new Criteria);
    parent::configure($options, $messages);
  }

  protected function doClean($values)
  {
    if (!is_array($values))
    {
      throw new InvalidArgumentException('You must pass an array parameter to the clean() method (this validator can only be used as a post validator).');
    }

    if (!is_array($this->getOption('column')))
    {
      $this->setOption('column', array($this->getOption('column')));
    }

    if (!is_array($field = $this->getOption('field')))
    {
      $this->setOption('field', $field ? array($field) : array());
    }
    $fields = $this->getOption('field');

    $criteria = $this -> getOption('criteria');
    if(!$criteria instanceof Criteria)
    {
      throw new InvalidArgumentException('You must pass a Criteria object.');
    }
    $criteria = clone $criteria;

    foreach ($this->getOption('column') as $i => $column)
    {
      $name = isset($fields[$i]) ? $fields[$i] : $column;
      if (!array_key_exists($name, $values))
      {
        // one of the column has be removed from the form
        return $values;
      }

      $colName = call_user_func(array(constant($this->getOption('model').'::PEER'), 'translateFieldName'), $column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);

      $criteria->add($colName, $values[$name]);
    }

    $object = call_user_func(array(constant($this->getOption('model').'::PEER'), 'doSelectOne'), $criteria, $this->getOption('connection'));

    // if no object or if we're updating the object, it's ok
    if (is_null($object) || $this->isUpdate($object, $values))
    {
      return $values;
    }

    $error = new sfValidatorError($this, 'invalid', array('column' => implode(', ', $this->getOption('column'))));

    if ($this->getOption('throw_global_error'))
    {
      throw $error;
    }

    $columns = $this->getOption('column');

    throw new sfValidatorErrorSchema($this, array($columns[0] => $error));
  }
}
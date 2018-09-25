<?php
/**
 * custom template class to wrap propel exceptions
 *
 * @author Richtermeister
 */
abstract class esqTwigTemplate extends Twig_Template
{
  protected function getAttribute($object, $item, array $arguments = array(), $type = Twig_TemplateInterface::ANY_CALL, $noStrictCheck = false, $line = -1)
  {
    try
    {
      return parent::getAttribute($object, $item, $arguments, $type, $noStrictCheck, $line);
    }
    catch(PropelException $e)
    {
      if (!$this->env->isStrictVariables()) {
          return null;
      }

      throw new Twig_Error_Runtime($e -> getMessage());
    }
  }
}
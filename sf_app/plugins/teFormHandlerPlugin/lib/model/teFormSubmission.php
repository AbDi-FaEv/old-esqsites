<?php


/**
 * Skeleton subclass for representing a row from the 'te_form_submissions' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Fri Feb 26 15:10:36 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.teFormHandlerPlugin.lib.model
 */
class teFormSubmission extends BaseteFormSubmission
{
  public function __toString()
  {
    return $this -> getFormType()." - ".$this -> getCreatedAt();
  }
} // teFormSubmission
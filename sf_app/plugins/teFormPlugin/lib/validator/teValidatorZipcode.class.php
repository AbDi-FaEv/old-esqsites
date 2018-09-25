<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teValidatorZipcode
 *
 * @author justin
 */
class teValidatorZipcode extends sfValidatorRegex
{
  const REGEX_ZIPCODE = '/^\d{5}([\-]\d{4})?$/i';

  /**
   * @see sfValidatorRegex
   */
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);

    $this->setOption('pattern', self::REGEX_ZIPCODE);
    $this->setMessage('invalid', 'Please enter a valid Zipcode');
  }
}

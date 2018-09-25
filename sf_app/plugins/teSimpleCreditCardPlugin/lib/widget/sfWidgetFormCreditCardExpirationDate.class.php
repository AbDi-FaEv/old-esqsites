<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormDate represents a date widget.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormDate.class.php 16259 2009-03-12 11:42:00Z fabien $
 */
class sfWidgetFormCreditCardExpirationDate extends sfWidgetFormDate
{
  
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    
    $this -> setOption('format', '%month%/%year%');
    $years = range(date('Y'), date('Y') + 10);
    $this -> setOption('years', array_combine($years, $years));

    $this -> setOption('can_be_empty', true);
    $this -> setOption('empty_values', array('year' => 'YYYY', 'month' => 'MM', 'day' => 'DD')); //day is not used
  }

}

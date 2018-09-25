<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormSchemaFormatterList.class.php 5995 2007-11-13 15:50:03Z fabien $
 */
class sfWidgetFormSchemaFormatterTeList extends sfWidgetFormSchemaFormatterList
{
  protected
    $rowFormat       = "<li>%label%\n %error%\n %field% %help%\n%hidden_fields%</li>\n",
    $errorListFormatInARow     = "  <ul class=\"error\">\n%errors%  </ul>\n",
    $errorRowFormat  = "<li>\n %errors%</li>\n",
    $helpFormat      = '<div class="help">%help%</div>',
    $decoratorFormat = "<ul>\n  %content%</ul>";
}
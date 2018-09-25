<?php
/**
 * Description of sfWidgetFormSchemaFormatterNone
 *
 * @author Richtermeister
 */
class sfWidgetFormSchemaFormatterNone extends sfWidgetFormSchemaFormatterList
{
  protected
    $rowFormat       = "%label%\n %error%\n %field% %help%\n%hidden_fields%\n",
    $errorListFormatInARow     = "  <ul class=\"error\">\n%errors%  </ul>\n",
    $errorRowFormat  = "<li>\n %errors%</li>\n",
    $helpFormat      = '<div class="help">%help%</div>',
    $decoratorFormat = "%content%";
}
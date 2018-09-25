<?php

/**
 * Represents a FCK Editor widget.
 *
 * @package    sfFCKEditorPlugin
 * @subpackage widget
 * @version    SVN: $Id$
 */
class sfWidgetFormFCKEditor extends sfWidgetFormTextarea
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('config', null);
    $this->addOption('tool', 'Default');
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $php_file = sfConfig::get('sf_rich_text_fck_js_dir', "js/fckeditor").DIRECTORY_SEPARATOR.'fckeditor.php';

    if (!is_readable(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$php_file))
    {
      throw new sfConfigurationException('You must install FCKEditor to use this helper (see rich_text_fck_js_dir settings).');
    }

    // FCKEditor.php class is written with backward compatibility of PHP4.
    // This reportings are to turn off errors with public properties and already declared constructor
    $error_reporting = error_reporting(E_ALL);

    require_once(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$php_file);

    // turn error reporting back to your settings
    error_reporting($error_reporting);

    $fckeditor           = new FCKeditor($name);
    $fckeditor->BasePath = sfContext::getInstance()->getRequest()->getRelativeUrlRoot().'/'.sfConfig::get('sf_rich_text_fck_js_dir', "js/fckeditor").'/';
    $fckeditor->Value    = $value;

    if (isset($attributes["width"]))
    {
      $fckeditor->Width = $attributes['width'];
    }
    elseif (isset($attributes['cols']))
    {
      $fckeditor->Width = (string)((int) $attributes['cols'] * 10).'px';
    }

    if (isset($attributes['height']))
    {
      $fckeditor->Height = $attributes['height'];
    }
    elseif (isset($attributes['rows']))
    {
      $fckeditor->Height = (string)((int) $attributes['rows'] * 10).'px';
    }

    if ($tool = $this -> getOption("tool"))
    {
      $fckeditor->ToolbarSet = $tool;
    }

    if ($config = $this -> getOption('config'))
    {
      $fckeditor->Config['CustomConfigurationsPath'] = javascript_path($config);
    }

    return $fckeditor->CreateHtml();
  }
}
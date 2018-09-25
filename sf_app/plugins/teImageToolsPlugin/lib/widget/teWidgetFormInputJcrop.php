<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teWidgetFormInputJcrop
 *
 * @author justin
 */
sfApplicationConfiguration::getActive()->loadHelpers('Url');

class teWidgetFormInputJcrop extends sfWidgetFormInputFile {
    //put your code here

  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('custom_javascripts', array());
    $this->addOption('jcrop_js_path',       public_path('/teImageToolsPlugin/js/jcrop/jquery.Jcrop.min.js'));
    $this->addOption('jcrop_css_path',       public_path('/teImageToolsPlugin/css/jcrop/jquery.Jcrop.css'));
  }

  public function getStyleSheets()
  {
    return array($this->getOption('jcrop_css_path') => "all");
  }

  public function getJavaScripts()
  {
    return array($this->getOption('jcrop_js_path'), public_path('/teImageToolsPlugin/js/jcrop/jcrop.config.js'));
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $output =  '<input type="hidden" id="x" name="x" />';
    $output .= '<input type="hidden" id="y" name="y" />';
    $output .= '<input type="hidden" id="w" name="w" />';
    $output .= '<input type="hidden" id="h" name="h" />';
    return $output;
  }
}
?>

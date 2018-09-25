<?php

/**
 * sfComment Creation form.
 *
 * @package    sfPropelActAsCommentableBehaviorPlugin
 * @subpackage form
 * @author     Xavier Lacot <xavier@lacot.org>
 * @see        http://www.symfony-project.org/plugins/sfPropelActAsCommentableBehaviorPlugin
 */
class sfCommentingForm extends BaseSfCommentingForm
{
  public function configure()
  {
  	$this -> widgetSchema -> setDefaultFormFormatterName("TeList");
  	$this -> widgetSchema -> moveField("text", sfWidgetFormSchema::LAST); //might move this into baseform later
  	
  	$this -> widgetSchema -> setHelp("email", "will not be published");
  	$this -> widgetSchema -> setLabel("title", "Website Name");
  	$this -> widgetSchema -> setLabel("text", "Your Comments");
  	
  	$allowed_html_tags = sfConfig::get('app_sfPropelActAsCommentableBehaviorPlugin_allowed_tags', array());
    sort($allowed_html_tags);
    $this -> widgetSchema -> setHelp("text", 'Allowed HTML tags are: '.htmlspecialchars(implode(', ', $allowed_html_tags)));
    
    $this -> widgetSchema -> getFormFormatter() -> setErrorListFormatInARow("  <ul class=\"error\">\n%errors%  </ul>\n");
    $this -> widgetSchema -> getFormFormatter() -> setRowFormat("<li>\n  %error% %help%\n %label%\n  %field%%hidden_fields%</li>\n");
    $this -> widgetSchema -> getFormFormatter() -> setHelpFormat('<span class="help">%help%</span>');
  }
}

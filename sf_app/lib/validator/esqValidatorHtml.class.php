<?php

/**
 * adds HTML cleanup capabilities via HTML purifier
 *
 * @author Richtermeister
 */
class esqValidatorHtml extends sfValidatorString
{
  protected function configure($options = array(), $messages = array())
  {
    $this->addOption('config');
    
    parent::configure($options, $messages);
  }

  /**
   * @return HTMLPurifier_Config
   */
  public static function getHtmlPurifierConfig()
  {
    $allowed_tags = '*[class|id],h1,h2,h3,h4,h5,h6,blockquote,p,a[href|target|title],img[src|alt|title|height|width|align],ul,ol,li,b,i,strong,em,strike,code,hr,br,div,table[width],thead,caption,tbody,tr,th,td[width],pre';
    
    $settings = array(
      'Core.RemoveInvalidImg' => false,
      'Cache.SerializerPath' => sfConfig::get("sf_app_cache_dir"),
      'HTML.Allowed' => $allowed_tags,
      'AutoFormat.Linkify' => true,
      'AutoFormat.AutoParagraph' => true,
      'AutoFormat.RemoveEmpty.RemoveNbsp' => true,
      'AutoFormat.RemoveEmpty' => true,
      'AutoFormat.RemoveSpansWithoutAttributes' => true,
    );

    $config = HTMLPurifier_Config::createDefault();
    $config->loadArray($settings);

    return $config;
  }

  protected function doClean($value)
  {
    $value = parent::doClean($value);

    spl_autoload_register(array('HTMLPurifier_Bootstrap', 'autoload'));

    if(!$config = $this->getOption('config'))
    {
      $config = self::getHtmlPurifierConfig();
    }
    $purifier = new HTMLPurifier($config);
    
    return $purifier->purify($value);
  }
}
<?php
/**
 * Response class for tsTitle correct output. 
 *
 * This class must be declared in factories.yml or by sfConfig directly as 
 * response class for given environment 
 *
 * @package     tsTitlePlugin
 * @author      Aliaksei Shytkin <e79eas@gmail.com>
 * @version     SVN: $Id$
 */
class tsTitleWebResponse extends sfWebResponse {
  
  /**
   * Storage for tsTitle object
   *
   * @var tsTitle
   */
  protected $_title;
  
  /**
   * Initialize 
   *
   * @param sfEventDispatcher $dispatcher
   * @param array $options
   * @return bool
   */
  public function initialize(sfEventDispatcher $dispatcher, $options = array()) {
    
    $this->_title = new tsTitle();
    return parent::initialize($dispatcher, $options);
  }
  
  /**
   * Get tsTitle
   *
   * @return tsTitle
   */
  public function getTitle() {
    
    return $this->_title;
  }
  
  /**
   * Set title string, it will be added to end 
   *
   * @param string $title
   * @param boolean $escape
   */
  public function setTitle($title, $escape = true) {
    if ($escape) {
      
      $title = htmlspecialchars($title, ENT_QUOTES, $this->options['charset']);
    }
    
    $this->getTitle()->push($title);
  }
  
  
  /**
   * @see sfResponse
   */
  public function serialize()
  {
    return serialize(array(
      
      $this->content, 
      $this->statusCode, 
      $this->statusText, 
      $this->options, 
      $this->cookies, 
      $this->headerOnly, 
      $this->headers, 
      $this->metas, 
      $this->httpMetas, 
      $this->stylesheets, 
      $this->javascripts, 
      $this->slots,
      
      $this->_title
    ));
  }
  
  /**
   * @see sfResponse
   */
  public function unserialize($serialized)
  {
    list(
      
      $this->content, 
      $this->statusCode, 
      $this->statusText, 
      $this->options, 
      $this->cookies, 
      $this->headerOnly, 
      $this->headers, 
      $this->metas, 
      $this->httpMetas, 
      $this->stylesheets, 
      $this->javascripts, 
      $this->slots,
      
      $this->_title
      
    ) = unserialize($serialized);
  }
  
  /**
   *
   * @see sfWebResponse 
   */
  public function copyProperties(sfWebResponse $response)
  {
    parent::copyProperties($response);
    $this->_title = $response->_title;
  }
}

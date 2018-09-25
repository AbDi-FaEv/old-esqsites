<?php
/**
 * Class storage for composite title object 
 *
 * It can be assigned as array or stack
 *
 * @package     tsTitlePlugin
 * @author      Aliaksei Shytkin <e79eas@gmail.com>
 * @version     SVN: $Id$
 */
class tsTitle implements Serializable{
  
  /**
   * Stack
   *
   * @var array
   */
  protected $_registry = array();
  
  /**
   * Constructor
   *
   * @param array $data
   */
  public function __construct($data = array()) {
    
    $this->set($data);
  }
  
  /**
   * Set title
   *
   * @param array $data Array of titles, which will be transformed to string
   */
  public function set($data = array()) {
    
    $data = is_array($data) ? $data : array($data);
    $this->_registry = array();
    
    foreach ($data as $part) {
      
      $this->push($part);
    }
  }
  
  /**
   * Push to title 
   *
   * @param string $data
   */
  public function push($data) {
    
    array_push($this->_registry, strval($data));
  }
  
  /**
   * Pop from title
   *
   * @return string
   */
  public function pop() {
    
    return array_pop($this->_registry);
  }
  
  /**
   * Unshift to titlde
   *
   * @param string $data
   */
  public function unshift($data) {

    array_unshift($this->_registry, $data);
  }
  
  /**
   * Generate title
   *
   * @param string $delimiter Delimiter
   * @param string $direction Direction (forward, backward)
   * @return string Title string
   */
  public function generate($delimiter = null, $direction = null) {
    
    $delimiter = is_null($delimiter) ? sfConfig::get('app_title_delimiter', ' | ') : $delimiter;
    $direction = is_null($direction) ? sfConfig::get('app_title_direction', 'backward') : $direction;
    
    $data = ($direction == "backward") ? array_reverse($this->_registry) : $this->_registry;
    
    $title = implode($delimiter, array_filter($data));
    return $title;
  }
  
  /**
   * String value
   *
   * @return string
   */
  public function __toString() {
    
    return $this->generate();
  }
  
  public function serialize(){
    
    return serialize($this->_registry);
  }
  
  public function unserialize($serialized){
    
    $this->_registry = unserialize($serialized);
  }
}
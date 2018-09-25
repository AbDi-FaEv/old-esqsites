<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teJcropFormclass
 *
 * @author justin
 */
class teJcropForm extends sfForm {
    //put your code here
  public function setup(){
    $this -> widgetSchema['crop'] = new teWidgetFormInputJcrop();
    $this -> widgetSchema['file'] = new sfWidgetFormInputHidden();
  }
}
?>

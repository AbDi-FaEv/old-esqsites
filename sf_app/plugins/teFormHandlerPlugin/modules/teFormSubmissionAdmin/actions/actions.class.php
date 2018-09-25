<?php

require_once dirname(__FILE__).'/../lib/teFormSubmissionAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/teFormSubmissionAdminGeneratorHelper.class.php';

/**
 * teFormSubmissionAdmin actions.
 *
 * @package    stingaree
 * @subpackage teFormSubmissionAdmin
 * @author     Richtermeister
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class teFormSubmissionAdminActions extends autoTeFormSubmissionAdminActions
{
  public function executeShow(sfWebRequest $request)
  {
    $this -> submission = $this -> getRoute() -> getObject();

    if(!$this -> submission -> getIsViewed())
    {
      $this -> submission -> setIsViewed(true) -> save();
    }

    $form_class = $this -> submission -> getFormType();
    $this -> form = new $form_class(unserialize($this -> submission -> getContent()), array(), false); //remove csrf token
  }

  public function executeExport(sfWebRequest $request)
  {
    $submissions = teFormSubmissionPeer::doSelect($this -> buildCriteria());
    $rows = array();
    foreach($submissions as $submission)
    {
      $values = array();
      $headers = array();
      $form_class = $submission -> getFormType();
      $s = unserialize($submission -> getContent());
      if(is_array($s))
      {
        $form = new $form_class(unserialize($submission -> getContent()), array(), false);
        foreach($form as $fieldname => $field)
        {
          if(!$field -> isHidden())
          {
            $headers[] = sfInflector::humanize($fieldname) . " (" . $fieldname . ")";
            $values[] = "\"" . htmlspecialchars(is_array($field -> getValue())? implode(",",$field -> getValue()): $field -> getValue()) . "\"";
          }
        }
        if(!isset($rows[$form_class]['id']))
        {
          $rows[$form_class]['id'] = $headers;
        }
        $rows[$form_class][$submission -> getId()] = $values;
      }
    }
    $data = NULL;
    foreach($rows as $form)
    {
      foreach($form as $row)
      {
        $data .= implode(',', $row) . "\n";
      }
    }
    // Output the headers to download the file
    header("Content-type: application/x-msdownload");
    header("Content-Disposition: attachment; filename=export.csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $data;
    exit;
  }
}

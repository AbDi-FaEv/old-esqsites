<?php

class ClientMessage extends BaseClientMessage
{
  const SEND_TYPE_STORE = '4';
  const SEND_TYPE_NOTICE_STORE = '1';
  const SEND_TYPE_MESSAGE_NO_STORE = '2';
  const SEND_TYPE_MESSAGE_STORE = '3';

  protected static $send_types = array(
    self::SEND_TYPE_STORE => "Just store all messages in my ESQ inbox, don't send any email notifications.",
    self::SEND_TYPE_NOTICE_STORE => "Send email recipient(s) submission notifications (no contents) and store all messages in my ESQ inbox.",
    self::SEND_TYPE_MESSAGE_NO_STORE => "Send email recipient(s) case submission messages and DO NOT store anything in my ESQ inbox.",
    self::SEND_TYPE_MESSAGE_STORE => 'Send email recipient(s) case submission messages AND store copies of all messages in my ESQ inbox.'
  );

  public static function getSendTypes()
  {
    return self::$send_types;
  }

  public static function getSendTypeString($type)
  {
    $type = trim($type);
    return isset(self::$send_types[$type]) ? self::$send_types[$type] : null;
  }

  public function preInsert(PropelPDO $con = null)
  {
    $this -> setId(ClientMessagePeer::generatePk());
    return parent::preInsert($con);
  }

  public function looksLikeSpam()
  {
    $spam_file = sfConfig::get("sf_config_dir")."/ip_blacklist.yml";
    $ips = file_exists($spam_file) ? sfYaml::load(file_get_contents($spam_file)) : array();

    return in_array($this -> getSubmittedByIp(), $ips);
  }
}
<?php

/**
 * integrates spam checker into ESQ universe
 *
 * @author Richtermeister
 */
class esqSpamCheckerApi extends SpamCheckerApi
{
  /**
   * converts a client message object into spam-api friendly params
   * 
   * @param ClientMessage $message
   * @return array
   */
  public static function getParamsFromMessage(ClientMessage $message)
  {
    return array(
      "user_ip" => $message ->getSubmittedByIp(),
      "user_agent" => $message -> getSubmittedByUserAgent(),
      "comment_author" => $message -> getName(),
      "comment_author_email" => $message -> getEmail(),
      "comment_content" => $message ->getMessage()
    );
  }

  /**
   * returns whether a client submission looks like spam
   *
   * @param ClientMessage $message
   * @return bool
   */
  public function messageIsSpam(ClientMessage $message)
  {
    $params = $this->getParamsFromMessage($message);
    return parent::isSpam($params);
  }
}
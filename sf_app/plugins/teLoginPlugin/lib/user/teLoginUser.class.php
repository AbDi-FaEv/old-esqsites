<?php

/**
 * adds commonly used functionality to handle authenticated users with a profile
 *
 * @author Richtermeister
 */
abstract class teLoginUser extends sfBasicSecurityUser
{
  /**
   * @return string
   */
  public function __toString()
  {
    return (string) $this->getProfile();
  }

  /**
   * stores the primary key of the authenticated user model
   *
   * @param string $id
   * @return teLoginUser
   */
  public function setId($id)
  {
    $this->setAttribute('id', $id);
    
    return $this;
  }

  public function getId()
  {
    return $this->getAttribute('id');
  }

  /**
   * returns the authenticated model associated with this user
   */
  abstract public function getProfile();

  /**
   * handles the login of an authenticated model
   */
  abstract public function login($model);

  /**
   * ends authentication
   */
  public function logout()
  {
    $this->setAuthenticated(false);
    $this->clearCredentials();
    
    return $this;
  }

  /**
   * generates a remember key between a cookie and the related user model
   *
   * @param sfWebResponse $response
   * @param bool $flag whether to remember or forget (true = remember)
   */
  public function rememberLogin(sfWebResponse $response, $flag)
  {
    $model = get_class($this->getProfile());

    // remove old keys
    $expiration_age = sfConfig::get('app_teLoginPlugin_remember_key_expiration_age', 15 * 24 * 3600);
    PropelQuery::from($model)->filterByLastLogin(array('max' => time() - $expiration_age))->update(array('RememberKey' => null));

    if($flag)
    {
      // generate new key
      $key = strtoupper(substr(md5($this->getProfile()->hashCode().rand(0, 99)), 0, 16));

      // save key
      $this->getProfile()->setRememberKey($key)->save();

      // set key as a cookie
      $response->setCookie('teLoginRemember', $key, time() + $expiration_age);
    }
    else //remove cookie
    {
      $this->getProfile()->setRememberKey(null)->save();
      $response->setCookie('teLoginRemember', null);
    }

    return $this;
  }

  /**
   * sets the referer
   *
   * @param string $referer
   * @return myUser
   */
  public function setReferer($referer)
  {
    $this->setAttribute('referer', $referer);
    return $this; //fluent
  }

  /**
   * returns the referer
   *
   * @return string
   */
  public function getReferer()
  {
    return $this->getAttribute('referer');
  }
}

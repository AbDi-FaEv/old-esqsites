<?php
/*
 * This file is part of the sfPropelActAsCommentableBehavior package.
 *
 * (c) 2007-2009 Xavier Lacot <xavier@lacot.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * This behavior permits to attach comments to Propel objects. Some more bits
 * about the philosophy of the stuff:
 *
 * - commentable objects must have a primary key
 * - comments can only be attached on objects that have already been saved
 * - comments are saved when applied
 *
 * @author   Xavier Lacot <xavier@lacot.org>
 * @see      http://www.symfony-project.org/plugins/sfPropelActAsCommentableBehaviorPlugin
 */

class CustomeSfPropelActAsCommentableBehavior extends sfPropelActAsCommentableBehavior
{


  /**
   * Returns the list of the comments attached to the object. The options array
   * can contain several options :
   * - order : order of the comments
   *
   * @param      BaseObject  $object
   * @param      Array       $options
   * @param      Criteria    $criteria
   *
   * @return     Array
   */
  public function getCommentObjectss(BaseObject $object, $options = array(), Criteria $criteria = null)
  {
    $c = $this->getCommentsCriteria($object, $options, $criteria);
    $comment_objects = sfCommentPeer::doSelect($c);
    $comments = array();
	
	return $comment_objects;
  }
}
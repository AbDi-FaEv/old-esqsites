<?php

sfPropelBehavior::add('teBlogPost', array (
  'sfPropelActAsCommentableBehavior' => 
  array (
  ),
  'sfPropelActAsTaggableBehavior' => 
  array (
  ),
  'sfPropelActAsSignableBehavior' => 
  array (
    'columns' => 
    array (
      'created' => 'te_blog_post.CREATED_BY',
      'updated' => 'te_blog_post.UPDATED_BY',
    ),
  ),
));

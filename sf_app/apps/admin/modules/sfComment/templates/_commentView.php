<?php use_helper('I18N', 'Date'); ?>
<div class="sf_comment" id="sf_comment_<?php echo $comment['Id'] ?>">

  <div class="sf_comment_text">
    <?php echo $comment['Text']; ?>
  </div>

  
    <?php
    if (!is_null($comment['AuthorId']))
    {
      $author = get_component('sfComment',
                              'author',
                              array('author_id'    => $comment['AuthorId'],
                                    'sf_cache_key' => $comment['AuthorId']));
    }
    else
    {
      $author = get_component('sfComment',
                              'author',
                              array('author_name'    => $comment['AuthorName'],
                                    'author_website' => $comment['AuthorWebsite']));
    }

    $date_format = sfConfig::get('app_sfPropelActAsCommentableBehaviorPlugin_date_format', 'words');
    if ('words' == $date_format)
    {
      $date = __('%1% ago', array('%1%' => distance_of_time_in_words(strtotime($comment['CreatedAt']))));
    }
    else
    {
      $date = format_date(strtotime($comment['CreatedAt']), $date_format);
    }
    ?>
  <p class="sf_comment_info"><?php echo $author; ?>, <?php echo format_date($comment['CreatedAt'], 'd'); ?> [<?php echo $date; ?>]</p>
</div>
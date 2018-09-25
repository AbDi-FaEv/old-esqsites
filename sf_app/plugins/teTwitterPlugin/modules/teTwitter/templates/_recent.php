<?php if($feed): ?>
  <?php use_helper("Date"); ?>
  <div class="tweets">
  <?php $total = count($feed -> getItems()); ?>
  <?php foreach($feed -> getItems() as $key => $tweet): ?>
    <div class="tweet <?php echo ($key % 2) ? "even" : "odd"; ?><?php if(($key + 1) == $total) echo " last"; ?>">
      <?php echo auto_link_text($tweet -> getDescription(), 'urls', array("class" => "noicon", "target" => "_blank")); ?>
      <br /><span class="small quiet"><?php echo time_ago_in_words($tweet -> getPubDate()); ?> ago</span>
    </div>
  <?php endforeach; ?>
  </div>
<?php endif; ?>
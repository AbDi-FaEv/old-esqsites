<h2>Latests Updates</h2>
<?php if($feed): ?>
<ul>
  <?php foreach($feed->getItems() as $post): ?>
  <li>
    <strong><?php echo time_ago_in_words($post->getPubDate()) ?> ago</strong> - "<?php echo $post->getDescription(); ?>"
  </li>
  <?php endforeach; ?>
</ul>
<?php else: ?>
<p>Temporarily N/A</p>
<?php endif; ?>
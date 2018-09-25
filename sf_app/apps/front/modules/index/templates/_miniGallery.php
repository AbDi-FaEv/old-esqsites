<p>Choose from a variety of modern designs, all hand-crafted around the legal profession to be visually appealing, fast-loading, and search-engine friendly.</p>
<div id="mini_gallery">
<ul>
  <?php foreach($templates as $template): ?>
  <li>
    <?php echo link_to(thumbnail_tag($template -> getImageUrl(), 200, 300, array("alt_title" => "ESQSites123 Template: ".$template -> getTitle())), "@gallery?id=".$template -> getId()); ?>
    <div class="caption">Theme: <?php echo $template -> getTitle(); ?></div>
  </li>
  <?php endforeach; ?>
</ul>
</div>
<script type="text/javascript">
  $().ready(function(){
    $('#mini_gallery ul').cycle({
      fx:     'fade',
      speed:  'slow'
    });
  });
</script>
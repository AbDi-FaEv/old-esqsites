<?php if($archive_entries && (count($archive_entries) > 0)): ?>
<h2><?php echo __('Archive') ?></h2>

<div id="te_blog_archive_list">
<ul>
<?php foreach($archive_entries as $entry): ?>
  <li><?php echo link_to(sprintf('%s %s <span class="num_posts">(%s)</span>', date("F", mktime(0, 0, 0, $entry["month"], 1, null)), $entry["year"], $entry["num"]), "@te_blog_archive?year=".$entry["year"]."&month=".$entry["month"]); ?></li>
<?php endforeach; ?>
</ul>
</div>
<a href="#" id="te_blog_archive_toggle">more</a>

<script>
  $().ready(function(){
    $("#te_blog_archive_list").addClass("collapsed");
    $("#te_blog_archive_toggle").toggle(function(){
      $("#te_blog_archive_toggle").html('less');
      $("#te_blog_archive_list").removeClass("collapsed");
    }, function(){
      $("#te_blog_archive_toggle").html('more');
      $("#te_blog_archive_list").addClass("collapsed");
    });
  });
</script>

<?php endif; ?>
<div id="sf_admin_bar" style="width:400px">

<?php if(!$template -> isNew()): ?>

<h2>Current Design:</h2
<?php try
{
echo link_to(
  thumbnail_tag($template -> getImageUrl(), 300, 500),
  image_path($template -> getImageUrl()),
  "class=lightbox");
}
catch(Exception $e)
{
  echo "No Preview Image Available.";
}
?>
<script>
  $().ready(function(){
    $("a.lightbox").lightBox();
  });
</script>

<?php endif; ?>
</div>

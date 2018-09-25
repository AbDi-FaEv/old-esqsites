<table width="100%" id="preview">
  <tr>
    <td width="150">
    </td>
    <td width="500">
    <div id="preview_browser_container">
    <ul id="preview_browser" class="jcarousel-skin-tango">
      <?php foreach($templates as $template): ?>
        <li>
          <?php echo link_to(thumbnail_tag($template -> getImageUrl(), 45, 45, array("height" => "45", "width" => "45", "alt_title" => $template -> getTitle()." (".$template -> getReference().")")), "switch_preview_template", $template, array("target" => "window")); ?>
        </li>
      <?php endforeach; ?>
    </ul>
    </div>
    </td>
    <td align="left">
      <?php echo link_to(image_tag("buttons/proceed.jpg"), "@checkout", array("target" => "_top")); ?>
    </td>
  </tr>
</table>
<div>Don't like what you see? Just click on any of the thumbnails above to preview a different design.</div>

<script language="JavaScript" type="text/javascript">
  $().ready( function() {
    $("#preview_browser").jcarousel({wrap: "both", scroll: 6});
    $("#preview_browser_container").css('visibility', 'visible');
  });
</script>
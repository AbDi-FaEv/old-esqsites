<table class="sf_admin_list" width="100%">
  <tr>
    <th>Title</th>
    <th style="width:100px;">Status</th>
    <th colspan="2">Move</th>
    <th colspan="2">Actions</th>
  </tr>
<?php foreach($pages as $key => $page): ?>
  <tr >
    <td>
      <?php echo link_to($page -> getTitle(), $page -> isMultiGroup() ? "page_show" : "page_edit", $page, "class=pagelink"); ?>
      <span class="ghost" style="margin-left:10px;">/<?php echo $page -> getUrl(); ?></span>
    </td>
    <td class="<?php echo $page -> getStatus() == Page::STATUS_ACTIVE ? "green" : "red"; ?>">
      <?php if($sf_user -> hasAccessToPageType($page -> getPageContentDisplayType())): ?>
        <?php echo $page -> getStatus() == Page::STATUS_ACTIVE ? image_tag("lightbulb", array("alt_title" => "This page is active.")) : image_tag("lightbulb_off", array("alt_title" => "This page is in-active.")); ?>
      <?php else: ?>
        <?php echo image_tag("lock", array("alt_title" => "Activating this page requires a hosting plan upgrade.")); ?>
      <?php endif; ?>
      <?php if($page -> getMenuType() == 1): ?>
        <?php echo link_to($page -> getStatusString(), "pages/toggleStatus?id=".$page -> getId(), "class=status_toggle method=put"); ?>
      <?php else: ?>
        <?php echo $page -> getStatusString(); ?> 
      <?php endif; ?>
    </td>
    <td width="16">
      <?php if($key + 1 > 1): ?>
        <?php echo link_to(image_tag("arrow_up"), "pages/move?direction=up&id=".$page -> getId(), "title=Move this page up method=put"); ?>
      <?php endif; ?>
    </td>
    <td width="16">
      <?php if($key + 1 < count($pages)): ?>
        <?php echo link_to(image_tag("arrow_down"), "pages/move?direction=down&id=".$page -> getId(), "title=Move this page down method=put"); ?>
      <?php endif; ?>
    </td>
    <td width="16"><?php echo link_to(image_tag("page_edit"), $page -> isMultiGroup() ? "page_show" : "page_edit", $page, "title=Edit this page"); ?></td>
    <td width="16">
      <?php if($page -> getMenuType() == 1): ?>
        <?php echo link_to(image_tag("page_delete"), "page_delete", $page, array("confirm" => "Delete This Page?\nPlease note that by continuing all of the information on this page will be lost and will not be retrievable.\n Are you sure you want to proceed?", "method" => "delete", "title" => "Delete this page")); ?>
      <?php endif; ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
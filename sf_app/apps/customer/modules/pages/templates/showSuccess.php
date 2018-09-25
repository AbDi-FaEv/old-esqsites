<h1>Page: "<?php echo $page -> getTitle(); ?>"</h1>

<?php include_partial("global/flashes"); ?>

<fieldset>
  <legend>Title</legend>
  <table>
    <tr>
      <th>Title:</th>
      <td><?php echo $page -> getTitle(); ?></td>
    </tr>
  </table>
</fieldset>

<fieldset>
  <legend>
    Page Content (<?php echo $page -> getPageContentDisplayType(); ?>)
    <?php if($page -> isMultiGroup()): ?>
    - <?php echo $page -> countValidPageGroups(); ?> entries so far
    <?php endif; ?>
  </legend>

  <div id="page_content">
    <?php include_partial("pages/content", array("page" => $page)); ?>
  </div>

  <?php if($page -> isMultiGroup()): ?>
  <ul class="sf_admin_actions">
    <li class="sf_admin_action_new"><?php echo link_to("Add New Entry", "page_group_new", array("page_group[page_id]" => $page -> getId())); ?></li>
  </ul>
  <?php endif; ?>
</fieldset>

<fieldset>
  <legend>Navigation</legend>
  <table>
    <tr>
      <th>URL:</th>
      <td><?php echo $page -> getUrl(); ?></td>
    </tr>
    <tr>
      <th>Link Name:</th>
      <td><?php echo $page -> getLinkName(); ?></td>
    </tr>
  </table>
</fieldset>

<fieldset>
  <legend>SEO & Meta Settings</legend>
  <table>
    <tr>
      <th>Meta Title:</th>
      <td><?php echo $page -> getMetaTitle() ? $page -> getMetaTitle() : "-"; ?></td>
    </tr>
    <tr>
      <th>Meta Description:</th>
      <td><?php echo $page -> getMetaDescription() ? $page -> getMetaDescription() : "-"; ?></td>
    </tr>
    <tr>
      <th>Meta Keywords:</th>
      <td><?php echo $page -> getMetaKeywords() ? $page -> getMetaKeywords() : "-"; ?></td>
    </tr>
  </table>
</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_delete"><?php echo link_to("Delete", "page_delete", $page,
          array("confirm" => "Delete This Page?\nPlease note that by continuing all of the information on this page will be lost and will not be retrievable.\n Are you sure you want to proceed?",
                "method" => "delete")); ?></li>
  <li class="sf_admin_action_list"><?php echo link_to("Back", "page"); ?></li>
  <li class="sf_admin_action_edit"><?php echo link_to("Edit", "page_edit", $page); ?></li>
</ul>

<br class="clear" />
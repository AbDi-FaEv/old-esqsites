<?php $page = $page_group -> getPage(); ?>

<?php if($page_group -> isNew()): ?>
  <p>You are adding an entry to page: "<?php echo link_to($page -> getTitle(), "page_show", $page); ?>"</p>
<?php else: ?>
  <p>You are editing an entry for page: "<?php echo link_to($page -> getTitle(), "page_show", $page); ?>"</p>
<?php endif; ?>
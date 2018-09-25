<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <li class="sf_admin_action_list"><?php echo link_to("Cancel", "page_show", $page_group -> getPage()); ?></li>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
<?php else: ?>
  <?php if($page_group -> getPage() -> isMultiGroup()): ?>
    <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ), 'confirm' => "Are you sure?",  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php endif; ?>
  <li class="sf_admin_action_list"><?php echo link_to("Cancel", "page_show", $page_group -> getPage()); ?></li>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
<?php endif; ?>
</ul>

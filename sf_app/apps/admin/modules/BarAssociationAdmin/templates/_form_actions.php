<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php else: ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <li class="sf_admin_action_editprofile">
<?php if (method_exists($helper, 'linkToEditProfile')): ?>
  <?php echo $helper->linkToEditProfile($form->getObject(), array(  'label' => 'Edit Profile',  'action' => 'editProfile',  'params' =>   array(  ),  'class_suffix' => 'editprofile',)) ?>
<?php else: ?>
  <?php echo link_to(__('Edit Profile', array(), 'messages'), 'BarAssociationAdmin/editProfile?id='.$bar_association->getId(), array()) ?>
<?php endif; ?>
  </li>
  <li><?php echo link_to("Login To Dashboard", "/bars.php/login?login[username]=".$form -> getObject() -> getAbbreviation()."&login[password]=".$form -> getObject() -> getPassword(), array("target" => "_blank", "method" => "post")); ?></li>
<?php endif; ?>
</ul>
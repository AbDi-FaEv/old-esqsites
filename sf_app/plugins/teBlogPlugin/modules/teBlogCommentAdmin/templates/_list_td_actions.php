<td>
  <ul class="sf_admin_td_actions">
    <?php if($sf_comment -> getModerationStatus() == sfPropelModerationBehavior::NOT_CHECKED) { ?>
       <li class="sf_admin_action_save"><?php echo link_to(__('Approve'), 'teBlogCommentAdmin/approve?id='.$sf_comment->getId(), array(), 'messages') ?></li>
       <li class="sf_admin_action_delete"><?php echo link_to(__('Refuse'), 'teBlogCommentAdmin/refuse?id='.$sf_comment->getId(), array(), 'messages') ?></li>
    <?php } ?>
    <?php echo $helper->linkToEdit($sf_comment, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($sf_comment, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
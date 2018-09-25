<div id="sf_admin_container">
  <div id="sf_admin_content">

    <h1>Form: <?php echo $submission -> getFormType(); ?> - <?php echo $submission -> getCreatedAt(); ?></h1>
    <?php include_partial("form_display", array("form" => $form)); ?>

    <ul class="sf_admin_actions">
      <li class="sf_admin_action_list"><?php echo link_to("Back To List", "@te_form_submission_admin"); ?></li>
      <li class="sf_admin_action_delete"><?php echo link_to("Delete", "te_form_submission_admin_delete", $submission, array("confirm" => "Are you sure?", "method" => "delete")); ?></li>
    </ul>
    <br class="clear" />
  </div>
</div>

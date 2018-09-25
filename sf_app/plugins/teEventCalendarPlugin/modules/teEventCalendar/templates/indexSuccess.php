<h1>Events</h1>

<?php include_partial("list_header"); ?>

<?php if($events && (count($events) > 0)): ?>
  <div id="te-events_list"><?php include_partial("list", array("events" => $events)); ?></div>
<?php else: ?>

<?php include_partial("no_results"); ?>

<?php endif;?>

<?php include_partial("list_footer"); ?>
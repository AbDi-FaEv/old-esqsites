<h1><?php echo $log -> getTaskName(); ?></h1>
<?php echo $log -> getStartedAt(); ?> - <?php echo $log -> getEndedAt(); ?>

<?php if($log -> getSummary()): ?>
<h2 class="<?php echo $log -> getStatus(); ?>"><?php echo $log -> getSummary(); ?></h2>
<?php endif; ?>

<?php if($log -> getLogFile() && file_exists($file = sfConfig::get("sf_root_dir")."/".$log -> getLogFile())): ?>
<div>
  <?php echo nl2br(file_get_contents($file)); ?>
</div>
<?php endif; ?>
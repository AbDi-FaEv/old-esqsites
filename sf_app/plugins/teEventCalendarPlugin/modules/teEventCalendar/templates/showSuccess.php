<div id="event_listing">
<h1><?php echo $event -> getTitle(); ?></h1>

<label>Date:</label>
<h3><?php echo $event -> getDate(sfConfig::get("app_teEventCalendarPlugin_date_format", "F jS - Y")) ?></h3>

<?php if($event -> getTime()): ?>
<label>Time:</label>
<h3><?php echo $event -> getTime(); ?></h3>
<?php endif; ?>

<?php if($event -> getLocation()): ?>
<label>Location:</label>
<h3><?php echo $event -> getLocation(); ?></h3>
<?php endif; ?>

<div class="event_description">
  <?php echo $event -> getDescription(); ?>
</div>
</div>
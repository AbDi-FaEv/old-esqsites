<?php if($events && count($events) > 0): ?>
<?php use_helper("Text"); ?>
<div class="te_event_minilist">
<ul>
<?php foreach($events as $event): ?>
  <li>
  	<a href="<?php echo url_for("te_calendar_event_show", $event); ?>">
	  <h3><?php echo $event -> getTitle(); ?></h3>
	  <div class="te_event_date"><?php echo $event -> getDate(sfConfig::get("app_teEventCalendarPlugin_date_format", "F jS - Y")) ?></div>
	  <div class="te_event_location"><?php echo $event -> getLocation(); ?></div>
	  <p> <?php echo truncate_text(strip_tags($event -> getExtract()), 85); ?></p>
	   <div class="more">More Info</div></a>
  </li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
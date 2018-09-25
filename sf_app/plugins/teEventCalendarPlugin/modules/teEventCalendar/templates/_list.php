<?php use_helper("Text"); ?>
<ul>
<?php foreach($events as $event): ?>
  <li>
  <div class="te_event_date"><?php echo $event -> getDate(sfConfig::get("app_teEventCalendarPlugin_date_format", "F jS - Y")) ?></div>
  <div class="te_event_location"><?php echo $event -> getLocation(); ?></div>
  <div class="te_event_list">
   <h3><?php echo link_to($event -> getTitle(), "te_calendar_event_show", $event); ?></h3>
   <?php echo truncate_text(strip_tags($event -> getExtract()), 200); ?>
  </div>&nbsp;
  </li>
<?php endforeach; ?>
</ul>
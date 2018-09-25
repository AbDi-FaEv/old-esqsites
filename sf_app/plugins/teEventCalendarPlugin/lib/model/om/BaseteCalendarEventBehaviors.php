<?php

sfPropelBehavior::add('teCalendarEvent', array (
  'sfPropelActAsSignableBehavior' => 
  array (
    'columns' => 
    array (
      'created' => 'te_calendar_events.CREATED_BY',
      'updated' => 'te_calendar_events.UPDATED_BY',
    ),
  ),
));

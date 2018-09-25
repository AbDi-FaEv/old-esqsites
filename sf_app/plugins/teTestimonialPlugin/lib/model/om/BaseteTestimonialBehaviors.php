<?php

sfPropelBehavior::add('teTestimonial', array (
  'sfPropelActAsSignableBehavior' => 
  array (
    'columns' => 
    array (
      'created' => 'te_testimonials.CREATED_BY',
      'updated' => 'te_testimonials.UPDATED_BY',
    ),
  ),
));

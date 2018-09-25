<?php

/**
 * teTestimonial form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class teTestimonialForm extends BaseteTestimonialForm
{
  public function configure()
  {
    unset($this["created_at"], $this["updated_at"], $this["updated_by"], $this["created_by"]);
  }
}

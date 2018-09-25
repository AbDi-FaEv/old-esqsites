<?php

class TemplateType extends BaseTemplateType
{
  public function __toString()
  {
    return $this -> getName();
  }
}

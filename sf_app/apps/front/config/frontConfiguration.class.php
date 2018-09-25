<?php

class frontConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    sfFormSymfony::setEventDispatcher($this -> dispatcher);
  }
}

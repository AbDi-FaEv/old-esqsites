<?php

class customerConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    sfOutputEscaper::markClassAsSafe("PageContentDisplayType");
  }
}

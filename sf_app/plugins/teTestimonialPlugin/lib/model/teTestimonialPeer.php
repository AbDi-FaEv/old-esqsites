<?php

class teTestimonialPeer extends BaseteTestimonialPeer
{
  public static function getRandom()
  {
    $c = new Criteria();
    $adapter = Propel::getDB(self::DATABASE_NAME);
    $c -> addAscendingOrderByColumn($adapter -> random(rand()));
    $c -> add(self::IS_PUBLISHED, true);
    return self::doSelectOne($c);
  }
}

<?php

class PluginteBlogPostCategory extends BaseteBlogPostCategory
{
  public function getNumPosts($published_only = true)
  {
    return teBlogPostFrontQuery::create() -> filterByCategory($this) -> count();
  }
}
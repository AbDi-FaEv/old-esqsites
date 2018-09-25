<?php

function te_blog_get_tag_links($tags, $separator = ", ")
{
  $links = array();
  foreach($tags as $tag)
  {
    $links[] = link_to($tag, 'te_blog_tag', array("tag" => $tag));
  }
  return implode($links, $separator);
}

function te_blog_get_category_links($categories, $separator = ", ")
{
  $links = array();
  foreach($categories as $category)
  {
    $links[] = link_to($category, 'te_blog_category', $category);
  }
  return implode($links, $separator);
}

function te_blog_get_author_link(teBlogPost $post)
{
  if($author = $post -> getAuthor())
  {
    return link_to($post -> getAuthorName(), "te_blog_author", $author);
  }
  return $post -> getAuthorName();
}

function te_blog_get_list_classes($posts, $classes = array())
{
  if($posts instanceof PropelObjectCollection)
  {
    $classes[] = $posts -> isEven() ? "even" : "odd";
    if($posts -> isFirst()) $classes[] = "first";
    if($posts -> isLast()) $classes[] = "last";
  }
  elseif($posts instanceof PropelModelPager)
  {
    $classes[] = $posts -> getResults() -> isEven() ? "even" : "odd";
    if($posts -> getResults() -> isFirst()) $classes[] = "first";
    if($posts -> getResults() -> isLast()) $classes[] = "last";
  }
  return $classes;
}
<?php

function link_to_cg_account($id, $content = null, $attributes = array())
{
  $attributes["target"] = "cg";
  $attributes["class"] = isset($attributes["class"]) ? $attributes["class"]." cg" : "cg";
  return link_to($content, "https://cheddargetter.com/admin/customers/get/id/".$id, $attributes);
}
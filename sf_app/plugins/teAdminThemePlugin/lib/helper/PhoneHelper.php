<?php


function format_phone($number)
{
  $number = trim(ereg_replace("[^0-9]",'',$number));
  if($number != "")
  {
    return "(".substr($number, 0, 3).") ".substr($number, 3, 3)."-".substr($number, 6, 4);
  }
}
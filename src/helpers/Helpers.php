<?php

namespace v\helpers;

class Helpers
{

  public static function randStr($n)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $str .= $characters[$index];
    }
    return $str;
  }

  public static function sanitizeMeth($meth)
  {
    return filter_var($meth, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  public static function sanitizeUri($uri)
  {
    return parse_url(filter_var($uri, FILTER_SANITIZE_FULL_SPECIAL_CHARS))["path"];
  }

  public static function sanitizeData($data)
  {
    return filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
}

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

  public static function updateTaux($data)
  {
    if (empty($data)) {
      header("Location: /taux");
      exit;
    }
    if (array_key_exists("taux", $data)) {
      $taux = abs((int) $data["taux"]) ;
    } else {
      $taux = 2500;
    }
    if ($taux == 0) {
      $taux = 2500;
    }
    $if = file_exists(__DIR__ . "/../files/taux.json");
    if ($if) {
      file_put_contents(__DIR__ . "/../files/taux.json", json_encode(["taux" => $taux]));
    } else {
      mkdir(__DIR__ . "/../files/taux.json");
      file_put_contents(__DIR__ . "/../files/taux.json", json_encode(["taux" => $taux]));
    }
    header("Location: taux");
    exit;
  }

  public static function getTaux()
  {
    $data = json_decode(file_get_contents(__DIR__ . "/../files/taux.json"), true);
    if (empty($data)) {
      $taux = 2500;
      mkdir(__DIR__ . "/../files/taux.json");
      file_put_contents(__DIR__ . '/../files.json', json_encode(['name' => $taux]));
      return $taux;
    } else {
      $taux = (int) $data["taux"];
      return $taux;
    }
  }
}

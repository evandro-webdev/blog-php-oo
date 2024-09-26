<?php

namespace app\support;

class Slugify
{
  public static function slugify(string $text)
  {
    // $text = strtolower($text);
    // $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // $text = preg_replace('~[^\w]+~', '-', $text);
    // $text = preg_replace('~-+~', '-', $text);
    // $text = trim($text, '-');

    // if (function_exists('iconv')) {
    //   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // }

    // $text = preg_replace("/[^a-z0-9]/", "-", $text);

    // return $text;

    $text = strtolower($text);

    // Transliterar para ASCII usando iconv
    if (function_exists('iconv')) {
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // Remover caracteres não alfanuméricos e hífens duplicados
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    $text = preg_replace('/[\s-]+/', '-', $text);
    $text = trim($text, '-');

    return $text;
  }
}

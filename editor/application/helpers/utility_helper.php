<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('public_url()')) {
  function public_url() {
    return base_url().'public/';
  }
};

if ( ! function_exists('limit_text()')) {
  function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
  }
};

if ( ! function_exists('random_num()')) {
  function random_num() {
    $part_1 = time();
    $part_2 = 0;
    for ($i = 1; $i <= 5; $i++) {
      $part_2 .= rand(0,9);
    }
    return $part_1.$part_2;
  }
};

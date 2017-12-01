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

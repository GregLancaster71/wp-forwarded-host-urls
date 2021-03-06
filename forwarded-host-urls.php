<?php

/*
Plugin Name:    Forwarded Host URLs
Description:    Forces WordPress to build urls using the Host header, if it exists.
Author:         blahed, nwah, PageKite
Author URI:     https://github.com/pagekite
Plugin URI:     https://github.com/pagekite/wp-forwarded-host-urls
Version:        0.0.3
*/

function has_forwarded_host() {
  return array_key_exists('HTTP_HOST', $_SERVER);
}

function forwarded_host() {
  return $_SERVER['HTTP_HOST'];
}

function forwarded_base() {
  $_forwarded_host = forwarded_host();
  return "//$_forwarded_host";
}

function apply_forwarded_host() {
  if ( !has_forwarded_host() )
    return false;
  else
    return forwarded_base();
}

function replace_with_forwarded_host($url, $path = '') {
  if ( !has_forwarded_host() )
    return $url;
  else
    return preg_replace('!https?://[a-z0-9.:-]*!', '//' . forwarded_host(), $url);
}

function cancel_canonical_redirect() {
  return false;
}

add_filter('pre_option_home', 'apply_forwarded_host');
add_filter('pre_option_siteurl', 'apply_forwarded_host');
add_filter('pre_option_url', 'apply_forwarded_host');
add_filter('stylesheet_uri', 'replace_with_forwarded_host');
add_filter('admin_url', 'replace_with_forwarded_host');
add_filter('template_directory_uri', 'replace_with_forwarded_host');
add_filter('redirect_canonical', 'cancel_canonical_redirect');

?>

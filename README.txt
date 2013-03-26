=== Forwarded Host URLs ===
Contributors: blahed
Tags: plugin, urls, hostname, host, links
Stable tag: 0.0.3
License: MIT

Forces WordPress to build urls using the Host header, if it exists.

== Description ==

A plugin to force WordPress to build urls based on the Host header. Useful if you're viewing a WordPress site using multiple domain names, or using a forwarding service like PageKite <https://pagekite.net/>.

We don't recommend using this in production, but it can be useful for development.

Forked from https://github.com/50east/wp-forwarded-host-urls , ideas from https://gist.github.com/949821 and http://odyniec.net/blog/2010/02/wordpress-blog-and-multiple-server-names/

== NOTE ==

This plugin may in fact be entirely unnecessary - you should be able to edit your wp-config.php file and replace the site name definition with the following:

    define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/path/to/wordpress');


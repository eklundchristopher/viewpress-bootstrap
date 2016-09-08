<?php

// Disallow direct file access.
if (! defined('ABSPATH')) {
    die('A little bit lost, are we?');
}

// Include Composer dependencies if found.
if (is_file($composer = __DIR__.'/vendor/autoload.php')) {
    require_once $composer;
}

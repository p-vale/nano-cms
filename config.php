<?php

// ERROR
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// SITE CONSTANTS
define( 'SITE_URL', 'http://localhost/nanocms/' );
define( 'SITE_TIMEZONE', 'Europe/Berlin' );
define( 'SITE_LANG', ['eng', 'en', 'en_EN'] );

// DATABASE
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_DATABASE', 'nanocms' );
define( 'DB_PORT', '3306' );
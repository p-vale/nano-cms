<?php
if ( ! file_exists( 'config.php' ) ) {
    die('ERROR: There is no configuration file');
}
require('config.php');

// DATE
setlocale( LC_TIME, SITE_LANG );
$timezone = new DateTimeZone( SITE_TIMEZONE );

// CONNECT TO DB
$app_db = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT );
if ($app_db === false ) {
    die('Error: database connection failed');
}

// CONNECT TO HELPERS
require('inc/posts.php');
require('inc/helpers.php');

// SESSION
session_start();

if ( isset( $_GET['logout'] ) ) {
    logout();
}
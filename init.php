<?php
if ( ! file_exists( __DIR__ . '/config.php' ) ) {
    die('ERROR: There is no configuration file');
}
require('config.php');

// DATE
setlocale( LC_TIME, SITE_LANG );
$timezone = new DateTimeZone( SITE_TIMEZONE );

// CONNECT TO HELPERS
require('inc/class-db.php');
require('inc/posts.php');
require('inc/helpers.php');

// CONNECT TO DB
// $app_db = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT );
// if ($app_db === false ) {
    // die('Error: database connection failed');
// }
$app_db = new DB( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT );

// SESSION
session_start();

if ( isset( $_GET['logout'] ) ) {
    logout();
}
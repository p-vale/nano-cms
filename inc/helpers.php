<?php

function redirect_to( $path ) {
    header( 'Location: ' . SITE_URL . $path );
    // die(); // it's easyer for me to understand the logic if die is eplicit in the page file
}

function generate_hash( $action ) {
    return md5( $action );
}

function check_hash( $action, $hash ) {
    if ( generate_hash( $action ) === $hash ) {
        return true;
    }
    return false;
}
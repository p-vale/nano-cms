<?php

function get_all_posts() {
  global $app_db;
  $results = mysqli_query( $app_db, 'SELECT * FROM posts' ); //call the db
  if ( ! $results ) {
    die( mysqli_error( $app_db ) );
  }
  return mysqli_fetch_all( $results, MYSQLI_ASSOC ); // get the values from db
}

function get_post( $post_id ) {
  global $app_db;
  $post_id = intval( $post_id ); // sanitize
  
  $query = 'SELECT * FROM posts WHERE id = ' . $post_id; // create a query that seraches a matching id
  $results = mysqli_query( $app_db, $query ); // get all the posts from that query (1)
  if ( ! $results ) {
    die( mysqli_error( $app_db ) );
  }
  return mysqli_fetch_assoc($results); // post found
}

function insert_post( $title, $excerpt, $content ) {
  global $app_db;
  
  $title = mysqli_real_escape_string( $app_db, $title);
  $excerpt = mysqli_real_escape_string( $app_db, $excerpt);
  $content = mysqli_real_escape_string( $app_db, $content);
  $published_on = date( 'Y-m-d H:i:s' );
  $query= "INSERT INTO posts
  ( title, excerpt, content, published_on )
  VALUES ( '$title', '$excerpt', '$content', '$published_on' )";

  $results = mysqli_query( $app_db, $query );
  if ( ! $results ){
    die( mysqli_error( $app_db ) );
  }
}

function delete_post( $id ) {
  global $app_db;
  $post_id = intval( $post_id ); // sanitize
  
  $results = mysqli_query( $app_db, "DELETE FROM posts WHERE id = $id");
  if ( !$results ) {
    die( mysqli_error( $app_db ) );
  }
}
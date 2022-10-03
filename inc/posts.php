<?php

function get_all_posts() {
  global $app_db;
  $result = $app_db->query( 'SELECT * FROM posts' ); //call the db
  return $app_db->fetch_all( $result ); // get the values from db
}

function get_post( $post_id ) {
  global $app_db;
  $post_id = intval( $post_id ); // sanitize
  
  $query = 'SELECT * FROM posts WHERE id = ' . $post_id; // create a query that seraches a matching id
  $result = $app_db->query( $query ); // get all the posts from that query (1)

  return $app_db->fetch_assoc($result); // post found
}

function insert_post( $title, $excerpt, $content ) {
  global $app_db;
  $published_on = date( 'Y-m-d H:i:s' );
  $title = $app_db->real_escape_string( $title);
  $excerpt = $app_db->real_escape_string( $excerpt);
  $content = $app_db->real_escape_string( $content);
  
  $query= "INSERT INTO posts
  ( title, excerpt, content, published_on )
  VALUES ( '$title', '$excerpt', '$content', '$published_on' )";

  $result = $app_db->query( $query );
}

function delete_post( $id ) {
  global $app_db;
  $post_id = intval( $post_id ); // sanitize
  
  $result = $app_db->query( "DELETE FROM posts WHERE id = $id");
}
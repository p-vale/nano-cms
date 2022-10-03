<?php
require( '../init.php' );

if ( ! is_logged_in() ) {
    redirect_to( 'login.php' );
}

$action = '';
if ( isset( $_GET['action'] ) ) {
    $action = $_GET['action'];
}
switch ( $action ) {
    case 'new-post': {
        $error = false;
        $title = "";
        $excerpt = "";
        $content = "";
        if (isset( $_POST['submit-new-post'] ) ) { // If the form was submitted
          $title = $_POST['title'];
          $excerpt = $_POST['excerpt'];
          $content = $_POST['content'];
          if ( empty( $title ) || empty( $content ) ) {
            $error = true;
          } else {
            $title = htmlspecialchars($title); // sanitize input
            $excerpt = htmlspecialchars($excerpt);
            $content = htmlspecialchars($content);
            insert_post( $title, $excerpt, $content );
            redirect_to( 'admin?action=list-posts&success=true' ); // parameter success for conditional rendering
            die();
          }
        }
        require 'templates\new-post.php';
        break;
    }
    case 'list-posts': {
        if ( isset( $_GET['delete-post'] ) ) {
            $id = $_GET['delete-post'];
            if ( check_hash( 'delete-post-' . $id, $_get['hash'] ) ) { // check cross-site forgery
                die( 'invalid request' );
            }
            delete_post( $id );
            redirect_to( 'admin?action=list-posts&success=true' );
            die();
        }
        $all_posts = get_all_posts();

        require 'templates\list-posts.php';
        break;
    }
    default: {
        require 'templates\admin.php';
    }
}
?>
<?php
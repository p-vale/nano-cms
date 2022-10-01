<?php
require('init.php');

$all_posts = get_all_posts();
$post_found = false;
if ( isset( $_GET['view'] ) ) { // if there is a view= from href
    $post_found = get_post( $_GET['view'] ); //first result of the last query
    if ( $post_found ) { // if the query sends back results
        $all_posts = [ $post_found ];
    }
}

function makedate($d) {
  global $timezone;
  $date = new DateTime($d);
  return $date->format('d M Y');
}

if ( isset( $_GET['delete-post'] ) ) {
  $id = $_GET['delete-post'];
  if ( check_hash( 'delete-post-' . $id, $_get['hash'] ) ) { // check cross-site forgery
    die( 'invalid request' );
  }
  delete_post( $id );
  redirect_to( 'blog.php' );
  die();
}

?>

<?php require('templates/header.php'); ?>
  <main>
    <?php if ( isset( $_GET['success'] ) ): ?>
      <div class="success">
        <p>New post created</p>
      </div>
    <?php endif; ?>
    <?php foreach ($all_posts as $post): ?>
      <article>
        <?php if ( $post_found  ): ?>
          <div class='meta'>
            <h2><?php echo $post['title'] ?></h2>
            <p><i>published on: 
              <?php echo makedate( $post['published_on'] ); ?>
            </i></p>
          </div>
          <p><?php echo $post['content'] ?></p>
        <?php else: ?>
          <div class='meta'>
          <h2><a href="?view=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h2>
            <p><i>published on: 
              <?php echo makedate( $post['published_on'] ); ?>
            </i></p>
          </div>
          <p><?php echo $post['excerpt'] ?></p>
        <?php endif; ?>
        <div class="delete-post">
          <a 
            href="?delete-post=<?php echo $post['id']; ?>
            &hash=<?php echo generate_hash( 'delete-post-' . $post['id'] ); ?>"
            >Delete post
          </a>
        </div>
      </article>
      <hr>
    <?php endforeach; ?>
  </main>
<?php require('templates/footer.php'); ?>
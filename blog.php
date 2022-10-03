<?php 
require( 'init.php' );
require('templates/head.php');

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

?>

<?php require( __DIR__ . '/templates/header.php' ); ?>
  <main class="main-blog">
    <?php foreach ($all_posts as $post): ?>
      <article>
        <?php if ( $post_found ): ?>
          <div class='meta'>
            <h2><?php echo $post['title'] ?></h2>
            <p class="post-date"><i>published on: 
              <?php echo makedate( $post['published_on'] ); ?>
            </i></p>
          </div>
          <p><?php echo $post['content'] ?></p>
        <?php else: ?>
          <div class='meta'>
          <h2><a href="?view=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h2>
            <p class="post-date"><i>published on: 
              <?php echo makedate( $post['published_on'] ); ?>
            </i></p>
          </div>
          <p><?php echo $post['excerpt'] ?></p>
        <?php endif; ?>
      </article>
      <hr>
    <?php endforeach; ?>
  </main>
  <script src="<?php echo SITE_URL ;?>/assets/sticky.js"></script>
<?php require('templates/footer.php'); ?>
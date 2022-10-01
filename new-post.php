<?php
require('init.php');

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
    redirect_to( 'blog.php?success=true' ); // parameter success for conditional rendering
    die();
  }
}

?>

<?php require('templates/header.php'); ?>
  <main>
    <h1>Create new post</h1>
    <?php if ( $error ): ?>
      <div class='error'>
        <p>Error: please add a title.</p>
      </div>
    <?php endif; ?>
    <form action="" method="post">
        <label for="title">Title (required)</label>
        <input type="text" 
                name="title" 
                id="title" 
                placeholder="An awsome title"
                value="<?php echo htmlspecialchars($title); ?>"
                >

        <label for="excerpt">Excerpt</label>
        <input type="text" 
                name="excerpt" 
                id="excerpt" 
                placeholder="A brief excerpt"
                value="<?php echo htmlspecialchars($excerpt); ?>"
                >

        <label for="content">Content (required)</label>
        <textarea name="content" 
                  id="content" 
                  placeholder="Write your post"
                  ><?php echo htmlspecialchars($content); ?></textarea>

        <p>
            <input type="submit" name="submit-new-post" value="SAVE POST">
        </p>
    </form>
  </main>
<?php require('templates/footer.php'); ?>
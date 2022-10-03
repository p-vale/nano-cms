<?php 
require __DIR__ . '/../../templates/head.php';
require __DIR__ . '/../../templates/header.php'; 
?>

<main class="main-admin">
    <?php if ( isset( $_GET['success'] ) ): ?>
        <div class="success">
            Post created successfully
        </div>
    <?php endif; ?>
    <h2>List of posts</h2>
    <table>
    <?php foreach ($all_posts as $post): ?>
        <tr>
            <td><?php echo $post['title'] ?></td>
            <td class="align-right"><a href="<?php echo SITE_URL . '/admin?action=list-posts&delete-post=' . $post['id'] ?>"&hash="<?php echo generate_hash( 'delete-post-' . $post['id'] ); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</main>

<script src="<?php echo SITE_URL ;?>/assets/sticky.js"></script>
</body>
</html>
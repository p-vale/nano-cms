<?php 
require __DIR__ . '/../../templates/head.php';
require __DIR__ . '/../../templates/header.php'; 
?>
<main class="main-admin">
    <h1>Create new post</h1>
    <?php if ( $error ): ?>
    <div class='error'>
        <p>Error: please add a title.</p>
    </div>
    <?php endif; ?>
    <form action="" method="post">
        <fieldset>
            <label for="title">Title <small>required</small></label>
            <input type="text" 
                    name="title" 
                    id="title" 
                    placeholder="An awsome title"
                    value="<?php echo htmlspecialchars($title); ?>"
                    >
        </fieldset>

        <fieldset>
            <label for="excerpt">Excerpt</label>
            <input type="text" 
                    name="excerpt" 
                    id="excerpt" 
                    placeholder="A brief excerpt"
                    value="<?php echo htmlspecialchars($excerpt); ?>"
                    >
        </fieldset>

        <fieldset>
            <label for="content">Content <small>required</small></label>
            <textarea name="content" 
                    id="content" 
                    placeholder="Write your post"
                    ><?php echo htmlspecialchars($content); ?></textarea>        
        </fieldset>

        <input type="submit" name="submit-new-post" value="SAVE POST">
    </form>
</main>

<script src="<?php echo SITE_URL ;?>/assets/sticky.js"></script>
</body>
</html>
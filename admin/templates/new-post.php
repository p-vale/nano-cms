    <?php require( __DIR__ . '/../../templates/header.php' ); ?>
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
    <?php require __DIR__ . '/../../templates/footer.php'; ?>
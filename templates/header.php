<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nanoCMS</title>
</head>
<body>
    <header>
        <nav>
            <ul>
            <li><a href="index.php">nanoCMS</a></li>
            <li><a href="blog.php">Blog</a></li>
            <?php if ( is_logged_in() ): ?>
                <li><a href="new-post.php">New post</a></li>
                <li><a href="?logout=true">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            </ul>
        </nav>
    </header>
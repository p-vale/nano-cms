<body>
    <header id="stickyheader">
        <nav>
            <ul>
            <li><a href="<?php echo SITE_URL ;?>index.php">nanoCMS</a></li>
            <li><a href="<?php echo SITE_URL ;?>blog.php">Blog</a></li>
            <?php if ( is_logged_in() ): ?>
                <li><a href="<?php echo SITE_URL ;?>admin">Administation</a></li>
                <li><a href="<?php echo SITE_URL ;?>?logout=true">Logout</a></li>
            <?php else: ?>
                <li><a href="<?php echo SITE_URL ;?>login.php">Login</a></li>
            <?php endif; ?>
            </ul>
        </nav>
    </header>
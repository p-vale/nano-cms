<?php 
require( 'init.php' );
require('templates/head.php');

$error = false;

if ( isset( $_POST['submit-login'] ) ) {
	if ( ! check_hash( 'login', $_POST['hash'] ) ) {
		die( 'Invalid request' );
	}
    if ( ! login( $_POST['username'], $_POST['password'] ) ) {
		$error = true;
	} 
}

if ( is_logged_in() ) { // session_start & function in init.php
    redirect_to( 'blog.php' );
}
?>

<?php require( 'templates/header.php' ); ?>
<h1>Login</h1>
<?php if ( $error ): ?>
	<div class="error"><?php echo "User or password error" ?></div>
<?php endif; ?>

<form action="" method="post">
	<fieldset class="login-fieldset">
		<label for="username">Username</label>
		<input type="text" name="username" id="username">
	</fieldset>

	<fieldset class="login-fieldset">
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
	</fieldset>
	
	<input type="hidden" name="hash" value="<?php echo htmlspecialchars( generate_hash( 'login' ), ENT_QUOTES ); ?>">

	<input type="submit" name="submit-login" value="Login">
</form>

<?php require('templates/footer.php'); ?>
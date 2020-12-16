<?php ob_start(); ?>
<form action="login" name="Login" method="POST">
	<input type="text" name="username" required="true">
	<input type="password" name="password" required="true">
	<input type="submit" name="login" value="Connection">
</form>
<?php $content = ob_get_clean();
require('view/template.php');
?>
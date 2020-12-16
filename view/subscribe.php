<?php ob_start(); ?>
<form action="subscribe" name="Subscribe" method="POST">
	<input type="text" name="username" required="true">
	<input type="password" name="password" required="true">
	<input type="password" name="password2" required="true">
	<input type="submit" name="subscribe" value="Connection">
</form>
<?php $content = ob_get_clean();
require('view/template.php');
?>

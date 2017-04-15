<?php

require 'header.php';

if (!isset($_SESSION['id'])) {
	# code...
	header('Location: index.php');
}
?>

<form action="../controller/Suggestion_Controller.php" method="POST">
	<input type="text" name="id_user" value="<?php echo $_SESSION['id']; ?>" style="display:none;">
	<textarea name="content" cols="50" rows="10"></textarea>
	<input type="submit" name="btn">
</form>

<?php

require 'footer.php';

?>
<?php
session_start(); 
require "header.php";

if (!isset($_SESSION['id'])) {
	# code...
	header('Location: home.php');
}


?>

<form action="../controller/Activity_Vote_Controller.php" method="POST">
	<input type="number" name="id_user" value="<?php echo $_SESSION['id']; ?>" class="display-none">
	<input type="number" name="id_activity" value="<?php echo "1";//id ?>">
	<input type="submit" name="btn">
</form>

<?php
require "footer.php";
?>


<?php
session_start();

if (!isset($_SESSION['id'])) {
	# code...
	header('Location: home.php');
}




?>


<!DOCTYPE html>
<html>
<head>
	<title>Vote</title>
</head>
<body>

<form action="../controller/Activity_Vote_Controller.php" method="POST">
	<input type="text" name="id_user" value="<?php echo $_SESSION['id']; ?>">
	<input type="test" name="id_ativity" value="<?php echo "1";//id ?>">
	<input type="submit" name="btn">
</form>

</body>
</html>
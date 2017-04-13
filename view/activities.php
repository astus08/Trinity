<?php

if (isset($idArticle)) {
	echo $idArticle;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>activities</title>
</head>
<body>

<form method="POST" action="Activity_Controller.php">
	<input type="text" name="test">
	<input type="submit" name="btn">
</form>

</body>
</html>
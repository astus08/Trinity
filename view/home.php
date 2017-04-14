<?php
	require "header.php";

session_start();

if (isset($_SESSION['id'])) {
	# code...
	echo "Vous êtes co !";
	var_dump($_SESSION);
}
else{
	//header('Location: index.php');
}

?>



<h1>hello home </h1>

<!-- Connexion FORM -->
<form method="POST" action="../controller/Connexion_Controller.php">
	<input type="email" name="mail" label="email">
	<input type="password" name="pwd" label="password">
	<input type="submit" name="btn" value="submit">
</form>

<!-- Inscription FORM -->
<form method="POST" action="../controller/Connexion_Controller.php">
	<input type="text" name="lastName" label="lastName">
	<input type="text" name="firstName" label="firstName">
	<input type="email" name="mail" label="email">
	<input type="password" name="pwd" label="password">
	<input type="password" name="pwd_repeat" label="password_repeat">
	<input type="submit" name="btn" value="submit">
</form>


<?php
require "footer.php";
?>
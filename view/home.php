<!DOCTYPE html>
<html>
<head>
	<title>home</title>
</head>
<body>

<h1>hello home </h1>

<!-- Connexion FORM -->
<form method="POST" action="Connexion_Controller.php">
	<input type="email" name="mail" label="email">
	<input type="password" name="pwd" label="password">
	<input type="submit" name="btn" value="submit">
</form>

<!-- Inscription FORM -->
<form method="POST" action="Connexion_Controller.php">
	<input type="text" name="lastName" label="lastName">
	<input type="text" name="firstName" label="firstName">
	<input type="email" name="mail" label="email">
	<input type="password" name="pwd" label="password">
	<input type="submit" name="btn" value="submit">
</form>

</body>
</html>
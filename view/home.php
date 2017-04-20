<?php
session_start(); 
require "header.php";

if (isset($_SESSION['id'])) {
	header('Location: index.php');
	# code...
	echo "Vous êtes co !";
	var_dump($_SESSION);
}
else{
	//header('Location: index.php');
}

?>





<!-- Connexion FORM -->
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/home_style2.css">

</head>
<?php 
if(isset($_GET['action'])&& $_GET['action']=='connect'){



?>
<div class="container">
		<img src="images/matureman.png">
			<form method="POST" action="../controller/Connexion_Controller.php">
					<div class="form-email">
						<input type="email" name="mail" label="email" placeholder="e-mail">
					</div>

					<div class="form-password">
						<input type="password" name="pwd" label="password" placeholder="Password">
					</div>

					
						<input class="btn-login" type="submit" name="btn" value="Login">
					
			</form>
</div>

<?php

}else{


?>



<!-- Inscription FORM -->

<div class="container">
	<img src="images/female.png">
	<form method="POST" action="../controller/Connexion_Controller.php">
		<div class="form-user">
			<input type="text" placeholder="Last name" name="lastName" label="lastName">
		</div>

		<div class="form-user">
			<input type="text" placeholder="First name" name="firstName" label="firstName">
		</div>


		<div class="form-email">
		<input type="email"  name="mail" label="email" placeholder="e-mail">
		</div>

		<div class="form-password">
		<input type="password"  name="pwd" label="password" placeholder="Password">
		</div>

		<div class="form-password">
		<input type="password" name="pwd_repeat" label="password_repeat" placeholder="Password confirmation">
		</div>
		<input  class="btn-login" type="submit" name="btn" value="S'inscire">
	</form>
</div>



<?php
}
require "footer.php";
?>
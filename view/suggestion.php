<?php

require 'header.php';

if (!isset($_SESSION['id'])) {
	# code...
	header('Location: index.php');
}
?>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<div class="container-suggestion">
	<form action="../controller/Suggestion_Controller.php" method="POST">
		<input type="text" name="id_user" value="<?php echo $_SESSION['id']; ?>" style="display:none;">
		<textarea class="text-box" name="content" cols="50" rows="10"></textarea>
		<input class="btn-login" value="Ajouter la suggestion" type="submit" name="btn">
	</form>
</div>

<?php

require 'footer.php';

?>
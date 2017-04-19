<?php

require "header.php"; 

include '../modele/PDO/SPDO.php';
use modele\PDO\SPDO;

?>


<h2>Birth Date</h2>
<form method="POST" action="../controller/Settings_Controller.php">
	<input style="display: none;" type="text" name="id_user" value="<?php echo $_SESSION['id']; ?>">
	<input type="Date" name="birth_date" <?php if (SPDO::getInstance()->getBirth(array($_SESSION['id']))[0] != null) {
		echo 'value="'.SPDO::getInstance()->getBirth(array($_SESSION['id']))[0].'"';
	} ?>>

	<input type="submit" name="btn_birth" >
</form>

<br>

<h2>Avatar</h2>
<form method="POST" action="../controller/Settings_Controller.php" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
	<input type="file" name="img_post" accept="image/*" required>
	<input type="submit" name="img">
</form>
<?php

require "footer.php"

?>
<?php
require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;

require 'header.php';

?>

<h2>Shopping list</h2>
<?php
$total = 0;

	echo "<ul>";
for ($i=0; $i < count($_SESSION['basket']); $i++) { 

		echo "<li> Name : ".SPDO::getInstance()->findProduct($_SESSION['basket'][$i])[0]."
				<ol> Price : ".SPDO::getInstance()->findProduct($_SESSION['basket'][$i])[1]."</ol>
					<form action='../controller/Cart_Controller.php' method='POST'>
						<input style='display:none;' name='id' type='text' value='".$i."'>
						<input name='btn' type='image' src='images/delete.svg' style='width: 15px;'>
					</form>
			</li>";

		$total += SPDO::getInstance()->findProduct($_SESSION['basket'][$i])[1];
}
	echo "<h3>Total : ".$total."</h3>";
	echo "</ul>";

require 'footer.php';

?>
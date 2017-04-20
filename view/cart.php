<?php

require 'header.php';

?>

<h2>Shopping list</h2>
<?php


	echo "<ul>";
for ($i=0; $i < count($_SESSION['basket']); $i++) { 
		echo "<li>".$_SESSION['basket'][$i]."</li>";
}
	echo "</ul>";

require 'footer.php';

?>
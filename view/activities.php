

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Affichage article</title>
        <link rel="stylesheet" href="/trinity/view/css/style.css"/>
	</head>
	<body>
		<header>Title</header>
        <section class="content">

			<?php
			if (isset($idArticle)){
				// ctrl->article(id)
				?>

				<?php
			} else { ?>
				<ul class="grid">
					<li class="card"></li>
				</ul>
			<?php
			}?>
        </section>

		<form method="POST" action="Activity_Controller.php">
			<input type="text" name="test">
			<input type="submit" name="btn">
		</form>

	</body>
</html>
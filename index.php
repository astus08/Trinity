<?php

$url = '';

if (isset($_GET['url'])) {
	$url = explode('/', $_GET['url']);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if ($url == '') {
		require 'view/home.php';
	}
	/* ----------- ACTIVITE -------------- */
	elseif ($url[0] == 'activities' && !empty($url[1])) {
		$idArticle = $url[1];
		require 'view\activities.php';
	}
	elseif ($url[0] == 'activities') {
		require 'view\activities.php';
	}
	/* ---------- SUGGESTION ------------- */
	elseif ($url[0] == 'suggestions') {
		require 'view\suggestions.php';
	}

}
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require 'controller\\'.$url[0];
}


?>
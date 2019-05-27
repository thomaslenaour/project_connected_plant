<?php

// Inclusion of configurations and classes files
include_once '_config/config.php';
include_once '_functions/functions.php';
include_once '_classes/Autoloader.php';
Autoloader::register();
include_once '_config/db.php';

// If there is a page in parameter
if (isset($_GET['page']) && !empty($_GET['page'])) {
	$page = trim(strtolower($_GET['page']));
}
else {
	$page = 'home';
}

// Array containing all pages
$allPages = scandir('controllers/');

// If page is in the array
if (in_array($page . '_controller.php', $allPages)) {
	include_once 'models/' . $page . '_model.php';
	include_once 'controllers/' . $page . '_controller.php';
	include_once 'views/' . $page . '_view.php';
}
else {
	include_once 'views/error_view.php';
}
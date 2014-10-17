
<?php
	include_once 'bdd_connection.php';

	session_start();

	if(isset($_SESSION['username'])) {
		logEvent($_SESSION['username'], 'logout');

		session_destroy();

		setcookie('username', ' ', 1);
	}

	header('Location: login.php');
	die();
?>
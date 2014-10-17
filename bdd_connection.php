
<?php
	define('BDD_USER', 'scala');
	define('BDD_PASSWORD', 'scala');
	define('BDD_URL', 'mysql:host=localhost;port=3306;dbname=al_bhed_translator');

	try {
		$pdo = new PDO(BDD_URL, BDD_USER, BDD_PASSWORD);
	} catch(PDOException $e) {
		die();
	}

	function logEvent($username, $event) {
		global $pdo;

		$pdo->exec("INSERT INTO CONNECTION_LOGS(USERNAME, EVENT) VALUES('" . $username . "', '" . $event . "')");
	}
?>
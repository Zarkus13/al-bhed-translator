
<?php
	include_once 'bdd_connection.php';

	session_start();

	if(isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
		$_SESSION['username'] = $_COOKIE['username'];
	}

	if(isset($_SESSION['username'])) {
		header('Location: translator.php');
		die();
	}
	else {
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			if(isset($_SESSION['username']) || isset($_COOKIE['username'])) {
				header('Location: /translator.php');
				die();
			}

			$error_msg = NULL;

			if(isset($_POST['username']) && isset($_POST['password'])) {
				$res = $pdo->query("SELECT * FROM USERS WHERE USERNAME = '" . strtolower($_POST['username']) . "'");

				$user = $res->fetch(PDO::FETCH_ASSOC);

				if(strtolower($_POST['username']) === $user['USERNAME'] && $_POST['password'] === $user['PASSWORD']) {
					$_SESSION['username'] = $user['USERNAME'];

					logEvent($user['USERNAME'], 'login');

					if(isset($_POST['remember']))
						setcookie('username', $user['USERNAME'], time() + (60 * 60 * 24 * 7));

					header('Location: /translator.php');
					die();
				}
				else {
					$error_msg = 'Wrong user or password';
				}
			}
			else {
				$error_msg = 'Please enter correct credentials';
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			if(isset($error_msg)) {
		?>
			<div style="color: red;"><?php echo $error_msg; ?></div>
		<?php
			}
		?>

		<form action="" method="POST">
			<label for="username">Username : </label> <input type="text" name="username" id="username" /> <br/>
			<label for="password">Password : </label> <input type="password" name="password" id="password" /> <br/>
			<input type="checkbox" name="remember" value="remember" id="remember" /> <label for="remember">Remember me</label> <br/>
			<input type="submit" value="login" />
		</form>
	</body>
</html>
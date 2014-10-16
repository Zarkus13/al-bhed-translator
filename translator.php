
<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('Location: /login.php');
		die();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Al-Bhed translator</title>
		<meta charset="utf-8" />
	</head>
	<body>

		<?php
			$table = array(
				'a' => 'y',
				'b' => 'p',
				'c' => 'l',
				'd' => 't',
				'e' => 'a',
				'f' => 'v',
				'g' => 'k',
				'h' => 'r',
				'i' => 'e',
				'j' => 'z',
				'k' => 'g',
				'l' => 'm',
				'm' => 's',
				'n' => 'h',
				'o' => 'u',
				'p' => 'b',
				'q' => 'x',
				'r' => 'n',
				's' => 'c',
				't' => 'd',
				'u' => 'i',
				'v' => 'j',
				'w' => 'f',
				'x' => 'q',
				'y' => 'o',
				'z' => 'w'
			);

			function translate($word) {
				global $table;
				$word = str_split(strtolower($word));

				foreach($word as $key => $letter) {
					$word[$key] = $table[$letter];
				}

				return implode($word);
			}
		?>

		<?php
			if(isset($_SESSION['username'])) {
				echo 'Welcome ' . $_SESSION['username'] . '! <a href="logout.php">Logout</a>';
			}
		?>
		<br/><br/>

		<form action="" method="GET">
			<label for="word">Word to translate : </label>
			<input type="text" name="word" id="word" />
			<input type="submit" value="translate !" />
		</form> <br/><br/>

		<?php
			if(isset($_GET['word'])) {
		?>
			<div>
				The translated word is : <?php echo translate($_GET['word']); ?>
			</div>
		<?php
			}
		?>
	</body>
</html>

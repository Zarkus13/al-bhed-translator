
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
				$word = str_split($word);

				foreach($word as $key => $letter) {
					$word[$key] = $table[$letter];
				}

				return implode($word);
			}

			echo translate('apricot');
		?>
	</body>
</html>

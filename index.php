<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Comments Report</title>
		<meta charset='utf-8'>
	</head>

	<body>
	<?php
			$servername = "127.0.0.1";
			$username = "sample";
			$password = "password";
			$database = "sw";

			try {
				$pdo = new PDO("mysql:host=$servername;dbname=$database;port=3306", $username, $password);
				// set the PDO error mode to exception
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}

			function displayComments($pdo, $header, $where) {
				echo "<h1>$header</h1>";

				$commentsStatement = $pdo->query("SELECT comments FROM sweetwater_test;");
				$comments = $commentsStatement->fetchAll(PDO::FETCH_COLUMN, 0);

				foreach ($comments as $comment) {
					echo "<p>$comment</p>";
				}
			}

			displayComments($pdo, "All", "");
		?>

	</body>
</html>
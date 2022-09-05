<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Comments Report</title>
		<meta charset='utf-8'>

		<style>
			main {
				max-width: 800px;
				margin: 0 auto;
			}

			.comment {
				background: #DDD;
				border-radius: 5px;
				padding: 10px;
			}
		</style>
	</head>

	<body>
		<main>
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

					$query = "SELECT comments FROM sweetwater_test";
					if ($where) $query .= " WHERE $where";
					$commentsStatement = $pdo->query($query);
					$comments = $commentsStatement->fetchAll(PDO::FETCH_COLUMN, 0);

					foreach ($comments as $comment) {
						echo "<p class='comment'>$comment</p>";
					}
				}

				$commentTypes = array(
					"Candy" => "comments LIKE '%candy%' OR comments LIKE '%smarties%' OR comments LIKE '%bit o\' honey%'",
					"Call/No Call" => "comments LIKE '%call%'",
					"Referral" => "comments LIKE '%refer%'",
					"Signature" => "comments LIKE '%sign%'",
					"Misc" => "comments NOT LIKE '%call%'
						AND comments NOT LIKE '%sign%'
						AND comments NOT LIKE '%refer%'
						AND comments NOT LIKE '%candy%'
						AND comments NOT LIKE '%smarties%'
						AND comments NOT LIKE '%bit o\' honey%'"
				);

				foreach ($commentTypes as $type => $where) {
					displayComments($pdo, "$type Comments", $where);
				}
			?>
		</main>
	</body>
</html>
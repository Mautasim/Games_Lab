<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Rock Paper Scissor Game</title>
	</head>
	<body>
		<h1>Welcome to Rock Paper Scissor Game</h1>
		<?php
			//echo(view_errors($errors));
			$human = $_REQUEST['turn'];
			$opponent = $_SESSION["opponent"];
			$state = $_SESSION["outcome"];
			echo "You played $human and opponent played $opponent";
			echo "\n";
			echo "Outcome: $state";
		?>

		<form method="post">
			<input type="submit" name="submit" value="play again" />
		</form>
	</body>
</html>

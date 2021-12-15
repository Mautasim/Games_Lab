<?php
	// So I don't have to deal with uninitialized $_REQUEST['guess']
	$_REQUEST['guess']=!empty($_REQUEST['guess']) ? $_REQUEST['guess'] : '';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Guess Game</title>
	</head>
	<body>
		<h1>Welcome to GuessGame</h1>
		<?php if($_SESSION["games"]->guessGame->getState()!="correct"){ ?>
			<form method="post">
				<input type="text" name="guess" value="<?php echo($_REQUEST['guess']); ?>" /> <input type="submit" name="submit" value="guess" />
			</form>
		<?php } ?>

		<?php echo(view_errors2($errors)); ?>

		<?php
			foreach($_SESSION['games']->guessGame->history as $key=>$value){
				echo("<br/> $value");
			}
			if($_SESSION["games"]->guessGame->getState()=="correct"){
		?>
				<form method="post">
					<input type="submit" name="submit1" value="start again1" />
				</form>
		<?php
			}
		?>
	</body>
</html>

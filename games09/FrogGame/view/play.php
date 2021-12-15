<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    <style>
		p {
			font-size: 25px;
			text-align: center;
			text-decoration: underline;
		}
		h1 {
			text-align: center;
		}
		@media (min-width: 800px) {
			.frog-container {
				display: flex;
				flex-direction: row;
				width: 70%;
				background-color: white;
			}
			.frog-container > .button {
				width: 10%;
				margin: 10px;
				text-align: center;
				font-size: 20px;
				border: solid black 1px;
				background: none;
			}
		}
		@media (max-width: 800px) {
			.frog-container {
				display: flex;
				flex-direction: column;
				width: 100%;
				background-color: white;
			}
			.frog-container > .button {
				width: 90%;
				margin: 10px;
				text-align: center;
				font-size: 20px;
				border: solid black 1px;
				background: lightblue; 
			}
		}
		</style>
		<title>Frog Game</title>
	</head>
	<body>
		<h1>Welcome to Frog Game</h1>
    <p> Try to move all the frogs to the right side and fish to the left </p>
    <form method="post">
      <div class="frog-container">
        <input type="submit" name ="button1" class="button"value="<?php $frog = $_SESSION["games"]->frogGame->findFrog("button1"); echo "$frog"; ?>">
        <input type="submit" name ="button2" class="button"value="<?php $frog = $_SESSION["games"]->frogGame->findFrog("button2"); echo "$frog"; ?>">
        <input type="submit" name ="button3" class="button"value="<?php $frog = $_SESSION["games"]->frogGame->findFrog("button3"); echo "$frog"; ?>">
        <input type="submit" name ="button4" class="button"value="<?php $frog = $_SESSION["games"]->frogGame->findFrog("button4"); echo "$frog"; ?>">
        <input type="submit" name ="button5" class="button"value="<?php $frog = $_SESSION["games"]->frogGame->findFrog("button5"); echo "$frog"; ?>">
        <input type="submit" name ="button6" class="button"value="<?php $frog = $_SESSION["games"]->frogGame->findFrog("button6"); echo "$frog"; ?>">
        <input type="submit" name ="button7" class="button"value="<?php $frog = $_SESSION["games"]->frogGame->findFrog("button7"); echo "$frog"; ?>">
      </div>
    </form>
	</body>
</html>

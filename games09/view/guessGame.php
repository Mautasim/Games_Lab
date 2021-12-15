<?php
	$page = $_SESSION['page'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Games</title>
	</head>
	<body>
		<header>
			<div id="navbar">
				<a href="index.php?stats=true" class="<?php if($page == 'all stats') {echo "active";} ?>" href="">All Stats</a>
				<a href="index.php?gues=true" class="<?php if($page == 'guess game') {echo "active";} ?>" href="">Guess Game</a>
				<a href="index.php?rps=true" class="<?php if($page == 'rock paper scissors') {echo "active";} ?>" href="">Rock Paper Scissors</a>
				<a href="index.php?frog=true" class="<?php if($page == 'frog') {echo "active";} ?>" href="">Frog</a>
				<a href="index.php?profile=true" class="<?php if($page == 'profile') {echo "active";} ?>" href="">Profile</a>
				<a href="index.php?click=true"class="<?php if($page == 'logout') {echo "active";} ?>">Logout</a>
			</div>
		</header>
		<main class="container">
			<section class="stats1">
				<?php
					require_once "guessGame2MVC/index.php";
				?>
			</section>
			<section class='stats2'>
				<h1>Stats</h1>
				<p> stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here </p>
			</section>
		</main>
		<footer>
			A project by Mautasim Siddiqui
		</footer>
	</body>
</html>

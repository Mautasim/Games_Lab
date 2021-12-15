<?php
	//ini_set('display_errors', 'On');
	require_once "lib/lib.php";
	require_once "model/something.php";
	session_save_path("sess");
	session_start();
	// checks for menu clicks
	function checkLogout(&$string) {
		if (isset($_GET['click'])) {
			if ($_GET['click'] == 'true') {
				$string = "login.php";
				$_SESSION['state'] = 'login';
				return "true";
			}
		}
		return "false";
	}
	function checkStats(&$string) {
		if (isset($_GET['stats'])) {
			if ($_GET['stats'] == 'true') {
				$string = "allStats.php";
				$_SESSION['state'] = 'allStats';
				$_SESSION['page'] = 'all stats';
				return "true";
			}
		}
		return "false";
	}

	function checkGuess(&$string) {
		if (isset($_GET['gues'])) {
			if ($_GET['gues'] == 'true') {
				$string = "guessGame.php";
				$_SESSION['state'] = 'guessGame';
				$_SESSION['page'] = 'guess game';
				return "true";
			}
		}
		return "false";
	}

	function checkRPS(&$string) {
		if (isset($_GET['rps'])) {
			if ($_GET['rps'] == 'true') {
				$string = "rps.php";
				$_SESSION['state'] = 'rps';
				$_SESSION['page'] = 'rock paper scissors';
				return "true";
			}
		}
		return "false";
	}

	function checkfrog(&$string) {
		if (isset($_GET['frog'])) {
			if ($_GET['frog'] == 'true') {
				$string = "frog.php";
				$_SESSION['state'] = 'frog';
				$_SESSION["page"] = 'frog';
				return "true";
			}
		}
		return "false";
	}

	function checkprofile(&$string) {
		if (isset($_GET['profile'])) {
			if ($_GET['profile'] == 'true') {
				$string = "unavailable.php";
				$_SESSION['state'] = 'profile';
				$_SESSION["page"] = 'profile';
				return "true";
			}
		}
		return "false";
	}

	$dbconn = db_connect();

	$errors=array();
	$view="";

	/* controller code */

	/* local actions, these are state transforms */
	if (!isset($_SESSION['page'])) {
		$_SESSION['page'] = 'all stats';
	}
	if(!isset($_SESSION['state'])){
		$_SESSION['state']='login';
	}
	if(!isset($_SESSION['state2'])){
		$_SESSION['state2']='play';
	}
	if(!isset($_SESSION['state3'])){
		$_SESSION['state3']='play';
	}
	if (!isset($_SESSION["state4"])) {
    $_SESSION["state4"] = "play";
  }
	if (!isset($_SESSION["games"])) {
		$_SESSION["games"] = new Games();
	}

	switch($_SESSION['state']){
		case "login":
			// the view we display by default
			$view="login.php";
			// check if register button is clicked
			if (!empty($_REQUEST["register"]) and $_REQUEST['register']=="Register") {
				$_SESSION['state']='registration';
				$view="registration.php";
				break;
			}

			// check if submit or not
			if(empty($_REQUEST['submit']) || $_REQUEST['submit']!="login"){
				break;
			}

			// validate and set errors
			if(empty($_REQUEST['user']))$errors[]='user is required';
			if(empty($_REQUEST['password']))$errors[]='password is required';
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			/*
			if(!$dbconn){
				$errors[]="Can't connect to db";
				break;
			}
			$query = "SELECT * FROM appuser WHERE userid=$1 and password=$2;";
                	$result = pg_prepare($dbconn, "", $query);

                	$result = pg_execute($dbconn, "", array($_REQUEST['user'], $_REQUEST['password']));
                	if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				$_SESSION['user']=$_REQUEST['user'];
				$_SESSION['state']='allStats';
				$view="allStats.php";
			}
			*/ 
			$view = "allStats.php";
			else {
				$errors[]="invalid login";
			}

			break;

		case "registration":
			if (empty($_REQUEST["reg"])) {
				break;
			}
			if ($_REQUEST["password"] != $_REQUEST["repassword"]) {
				$_SESSION["state"] = "registration";
				$view = "registration.php";
				echo "Error: Passwords are not the same!!";
				break;
			}
			$_SESSION["state"] = "login";
			$view = "login.php";
			break;

		case "frog":
			if (checkLogout($view) == 'true' or checkStats($view) == 'true'
			 or checkGuess($view) == 'true' or checkRPS($view) == 'true' or
		 	checkfrog($view) == 'true' or checkprofile($view) == 'true') {
				$_SESSION["games"]->resetFrogGame();
				break;
			}
			$view = "frog.php";
			$_SESSION['state'] = 'frog';
			$_SESSION["page"] = 'frog';
			break;

		case "profile":
			if (checkLogout($view) == 'true' or checkStats($view) == 'true'
			 or checkGuess($view) == 'true' or checkRPS($view) == 'true' or
		 	checkfrog($view) == 'true' or checkprofile($view) == 'true') {
				break;
			}
			$view = "unavailable.php";
			$_SESSION['state'] = 'unavailable';
			$_SESSION["page"] = 'profile';
			break;

		case "allStats":
			if (checkLogout($view) == 'true' or checkStats($view) == 'true'
			 or checkGuess($view) == 'true' or checkRPS($view) == 'true' or
		 	checkfrog($view) == 'true' or checkprofile($view) == 'true') {
				break;
			}
			$view = "allStats.php";
			$_SESSION['state'] = 'allStats';
			break;

		case "rps":
			if (checkLogout($view) == 'true' or checkStats($view) == 'true'
			 or checkGuess($view) == 'true' or checkRPS($view) == 'true' or
		 	checkfrog($view) == 'true' or checkprofile($view) == 'true') {
				break;
			}
			$view = "rps.php";
			$_SESSION['state'] = 'rps';
			break;

		case "guessGame":
			if (checkLogout($view) == 'true' or checkStats($view) == 'true'
			 or checkGuess($view) == 'true' or checkRPS($view) == 'true' or
		 	checkfrog($view) == 'true' or checkprofile($view) == 'true') {
				break;
			}
			$view = "guessGame.php";
			$_SESSION['state'] = 'guessGame';
			break;
	}
	require_once "view/$view";
?>

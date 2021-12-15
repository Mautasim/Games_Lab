<?php
	/*
	session_save_path("sess");
	session_start();
	*/
	//ini_set('display_errors', 'On');

	$view="";
	$errors=array();

	/* controller code */
	switch($_SESSION['state2']){
		case "login":
			// the view we display by default
			$view="login.php";

			// check if submit or not
			if(empty($_REQUEST['submit']) || $_REQUEST['submit']!="login"){
				break;
			}

			// validate and set errors
			if(empty($_REQUEST['user'])){
				$errors[]='user is required';
			}
			if(empty($_REQUEST['password'])){
				$errors[]='password is required';
			}
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			if($_REQUEST['user']=="arnold" && $_REQUEST['password']=="something"){
				$_SESSION['GuessGame']=new GuessGame();
				$_SESSION['state2']='play';
				$view="play.php";
			} else {
				$errors[]="invalid login";
			}
			break;

		case "play":
			// the view we display by default
			$view="play.php";

			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="guess"){
				break;
			}

			// validate and set errors
			if(!is_numeric($_REQUEST["guess"]))$errors[]="Guess must be numeric.";
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			$_SESSION["games"]->guessGame->makeGuess($_REQUEST['guess']);
			if($_SESSION["games"]->guessGame->getState()=="correct"){
				$_SESSION['state2']="won";
				$view="won.php";
			}
			$_REQUEST['guess']="";

			break;

		case "won":
			// the view we display by default
			$view="play.php";

			// check if submit or not
			if(empty($_REQUEST['submit1'])||$_REQUEST['submit1']!="start again1"){
				// $errors[]="Invalid request";
				$view="won.php";
			}

			// validate and set errors
			// if(!empty($errors))break;


			// perform operation, switching state and view if necessary
			$_SESSION["games"]->resetGuessGame();
			$_SESSION['state2']="play";
			$view="play.php";

			break;
	}
  require_once "view/view_lib.php";
	require_once "view/$view";
?>

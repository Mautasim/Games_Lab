<?php
	/*
	session_save_path("sess");
	session_start();
	*/
	// ini_set('display_errors', 'On');

	$errors=array();
	$view="";

	/* controller code */

	switch($_SESSION['state3']){
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
			if($_REQUEST['user']=="moe" && $_REQUEST['password']=="sidd"){
				$_SESSION['RPSgame']=new RPSgame();
				$_SESSION['state3']='play';
				$view="play.php";
			} else {
				$errors[]="invalid login";
			}
			break;

		case "play":
			// the view we display by default
			$view="play.php";

			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="roll"){
				break;
			}

			// validate and set errors
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			$_SESSION["games"]->rpsGame->makeRPS($_REQUEST['turn']);
			if($_SESSION["games"]->rpsGame->getState()!=""){
				$_SESSION["outcome"] = $_SESSION["games"]->rpsGame->getState();
				$_SESSION['state3']="won";
				$view="won.php";
			}
			break;

		case "won":
			// the view we display by default
			$view="play.php";

			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="play again"){
				$errors[]="Invalid request";
				$view="won.php";
			}

			// validate and set errors
			if(!empty($errors))break;


			// perform operation, switching state and view if necessary
			$_SESSION["games"]->resetrpsGame(); 
			$_SESSION['state3']="play";
			$view="play.php";

			break;
	}
	// require_once "view/view_lib.php";
	require_once "view/$view";
?>

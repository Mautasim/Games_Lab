<?php
	require_once "model/FrogGame.php";
  /*
	session_save_path("sess");
	session_start();
  */
	// ini_set('display_errors', 'On');

	$view="";

	/* controller code */

  $buttons = array("button1", "button2", "button3", "button4", "button5",
   "button6", "button7");

  function checkButton($button) {
    if (isset($_POST[$button])) {
      $_SESSION["games"]->frogGame->moveButton($button);
      unset($_POST[$button]);
      return "true";
    }
    return "false";
  }

	switch($_SESSION['state4']){
		case "play":
			// the view we display by default
			$view="play.php";
      // check if button clicked or not
      foreach ($buttons as $button) {
        if (checkButton($button) == "true") {
          if ($_SESSION["games"]->frogGame->gameWon() == "true") {
            $view = "won.php";
            $_SESSION["state4"] = "won";
          }
          break;
        }
      }
      break;

			// perform operation, switching state and view if necessary

		case "won":
			// the view we display by default
			$view="play.php";

			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="play again"){
				$errors[]="Invalid request";
				$view="won.php";
			}
			// perform operation, switching state and view if necessary
			$_SESSION["games"]->resetFrogGame();
			$_SESSION['state4']="play";
			$view="play.php";

			break;
	}
	// require_once "view/view_lib.php";
	require_once "view/$view";
?>

<?php
require_once "FrogGame\model\FrogGame.php";
require_once "GuessGame2MVC\model\GuessGame.php";
require_once "rockPaperScissor2\model\RPSgame.php";

class Games {
	public $frogGame;
	public $guessGame;
	public $rps;

	public function __construct() {
		$this->frogGame = new FrogGame();
		$this->guessGame = new GuessGame();
		$this->rpsGame = new RPSgame();
  }
	public function resetGuessGame() {
		$this->guessGame = new GuessGame();
	}
	public function resetFrogGame() {
		$this->frogGame = new FrogGame();
	}
	public function resetrpsGame() {
		$this->rpsGame = new RPSgame(); 
	}

}
?>

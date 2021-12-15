<?php

class RPSgame {

	public $turns;
	public $won;
	public $lost;
	public $tied;
	public $state;

	public function __construct() {
					$this->state = "";
    	}
	public function makeTurn() {
		$num = rand(1, 3);
		if ($num == 1) return "paper";
	  if ($num == 2) return "rock";
		if ($num == 3) return "scissors";
	}

	public function makeRPS($rps){
		$rpsComp = $this->makeTurn();
		$_SESSION["opponent"] = $rpsComp;
		if ($rpsComp == $rps) {
			$this->state = "tie";
		}
		if ($rpsComp == "rock" and $rps == "paper"){
			$this->state = "win";
		}
		if ($rpsComp == "rock" and $rps == "scissors") {
			$this->state = "lose";
		}
		if ($rpsComp == "paper" and $rps == "scissors") {
			$this->state = "win";
		}
		if ($rpsComp == "paper" and $rps == "rock") {
			$this->state = "lose";
		}
		if ($rpsComp == "scissors" and $rps == "rock") {
			$this->state = "win";
		}
		if ($rpsComp == "scissors" and $rps == "paper") {
			$this->state = "lose";
		}
	}

	public function getState(){
		return $this->state;
	}
}
?>

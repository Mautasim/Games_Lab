<?php
class FrogGame {
  public $state;
  public $position;
  public $direction;

	public function __construct() {
    $this->position = array("frog1"=>"button1", "frog2"=>"button2",
     "frog3"=>"button3", "fish1"=>"button5", "fish2"=>"button6", "fish3"=>"button7");
    $this->direction = array("frog1"=>"right", "frog2"=>"right",
       "frog3"=>"right", "fish1"=>"left", "fish2"=>"left", "fish3"=>"left");
    $this->types = array("frog1"=>"frog", "frog2"=>"frog",
       "frog3"=>"frog", "fish1"=>"fish", "fish2"=>"fish", "fish3"=>"fish");
    $this->correlation = array("button1"=>1, "button2"=>2, "button3"=>3,
    "button4"=>4, "button5"=>5, "button6"=>6, "button7"=>7);
  }
  public function missing() {
    foreach($this->correlation as $key=>$value) {
      if ($this->findFrog($key) == "") {
        return $value;
      }
    }
  }
  public function findButton($num) {
    foreach($this->correlation as $key=>$value) {
      if ($value == $num) {
        return $key;
      }
    }
  }
  public function moveButton($num) {
    $frog = $this->findFrog($num);
    $direction = $this->direction[$frog];
    $available = $this->missing();
    if ($direction == "right") {
      if ($this->correlation[$num] + 1 == $available) {
        $button = $this->findButton($this->correlation[$num] + 1);
        unset($this->position[$frog]);
        $this->position[$frog] = $button;
      } else if ($this->correlation[$num] + 2 == $available) {
        $button = $this->findButton($this->correlation[$num] + 2);
        unset($this->position[$frog]);
        $this->position[$frog] = $button;
      }
    } else {
      if ($this->correlation[$num] - 1 == $available) {
        $button = $this->findButton($this->correlation[$num] - 1);
        unset($this->position[$frog]);
        $this->position[$frog] = $button;
      } else if ($this->correlation[$num] - 2 == $available) {
        $button = $this->findButton($this->correlation[$num] - 2);
        unset($this->position[$frog]); 
        $this->position[$frog] = $button;
      }
    }
  }
  public function findFrog($num) {
    foreach($this->position as $key=>$value) {
      if ($value == $num) {
        return $key;
      }
    }
    return "";
  }
  public function gameWon() {
    for($x = 1; $x < 4; $x++) {
      $button = $this->findButton($x);
      $frog = $this->findFrog($button);
      if ($frog == "" or $this->types[$frog] == "frog") {
        return "false";
      }
    }
    for ($y = 5; $y < 8; $y++) {
      $button = $this->findButton($button);
      $frog = $this->findFrog($button);
      if ($frog == "" or $this->types[$frog] == "fish") {
        return "false";
      }
    }
    return "true";
  }
}
$frogGame = new FrogGame();
$frogGame->moveButton("button3");
$frog = $frogGame->findFrog("button4");

?>

<?php


class crapsGame{

	// Set values that casue an instance when point is not set 
	public $off_crap_array = array(2,3,12);
	//public $off_crap_array = array(2,3,12);
	public $off_point_array = array(7,11);
	
	// Set values that casue an instance when point is set
	public $on_crap_array = array(7);
	public $on_field_array = array(2,3,4,5,6,8,9,10,11,12);
	
	private $rollerStatus = true; // Is the roller still rolling?
	private $pointStatus = false; // If the point on/off
	private $pointValue = null;		// If point is set what is its value
	private $rollValue = null;		// What is the value of the current roll
	
	private $betValue = null;
	
	

	// Getters and Setters.
	
	// Value of the current roll (1-12)
	public function setRollValue($var){
		$this->rollValue = $var;
	}
	
	public function getRollValue(){
		return $this->rollValue;
	}
	
	// Status of the point (bool) 
	public function setPointStatus($var){
		$this->pointStatus = $var;
	}
	
	public function getPointStatus(){
		return $this->pointStatus;
	}
	
	// Value of the point (1-12)
	public function setPointValue(){
		$this->pointValue = $this->getRollValue();
	}

	
	public function getPointValue(){
		return $this->pointValue;
	}
	

	// Logical functions
	public function rollDice(){
		
		$rollDice1 = rand(1,6);
		$rollDice2 = rand(1,6);
		
		$roll = array(
			"dice1" => $rollDice1,
			"dice2" => $rollDice2,
			"rollValue" => $rollDice1 + $rollDice2
		);
		
		$this->setRollValue($roll["rollValue"]);
	}
	
	
	public function compareRoll($pointType){
		if (in_array($this->getRollValue(),$pointType))
			return true;
		else
			return false;
	}
	
	public function clearPoint(){
		$this->pointValue = null;
		$this->setPointStatus(false);
	}
	
	private function calculatePayout(){
		return $this->betValue;
	}

}

?>
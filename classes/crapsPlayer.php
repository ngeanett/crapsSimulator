<?php

class crapsPlayer{
	
	private $playerName = "Guido";
	private $bankRoll = 0;
	private $betAmount = 0;
	private $betPassLine = false;
	private $betDontPassLine = false;
	private $betPosition = null; // This will need to be a new class
	
	
	public function getBetPassLine(){
		return $this->betPassLine;
	}
	
	public function getDontPassLine(){
		return $this->betDontPassLine;
	}
	
	public function getBankRoll(){
		return $this->$bankRoll;
	}
	
	public function payPassLineBet($var){
		// For now we will pay 1:1
		$this->$bankRoll = $var;
	}
	
	public function placePassLineBet($var){
		$this->betPassLine = $var;
	}
	
	public function placeDontPassLineBet($var){
		$this->betDontPassLine = $var;
	}
	
	public function placeFieldBet($betAmount,$betPosition){
		$this->betAmount = $betAmount;
		$this->betPosition = $betPosition;
	}
	
}

?>
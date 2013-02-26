<?php

// Craps simulator

// Include main file loader
if(file_exists("init_includes.php"))
	include("init_includes.php");

	
echo TITLE;

	// Start a new game
	$game = new crapsGame();
	$player = new crapsPlayer();
	
	$player->placePassLineBet(true);
	// Need to impliment betting class & UI
	//$player->placeFieldBet(5,8);
	//$player->placeFieldBet(5,8);

	//while(){
	
		// Roll the die until game roller changes
		$game->rollDice();
		output("Roll is: " . $game->getRollValue());
	
		// Check to see if a point is set or not
		if($game->getPointStatus() == false){
			if(in_array($game->getRollValue(), $game->off_crap_array)){
				// take $$ from "pass line bet"
				// pay $$ to "don't pass bet"
				output("Don't pass wins: " . $game->getRollValue());
				
			}	
			elseif(in_array($game->getRollValue(), $game->off_point_array)){
				// pay out $$
				output("Pass line gets paid! " . $game->getRollValue());
				
			}else{
				// Turn on the point and set the value
				$game->setPointStatus(true);
				$game->setPointValue();
				
				output("Point is set: " . $game->getPointValue());
				
			}
		
		// Point is on
		}elseif($game->getPointStatus() == true){
			if(in_array($game->getRollValue(), $game->on_field_array)){
				
				if($game->getRollValue() == $game->getPointValue()){
					if ($player->getBetPassLine())
						output("Pass line gets paid! " . $game->getRollValue());
					else 
						output("bet the pass next time.");
				}else{
					// Set case statements for payout of 3:4:5 odds
					output("You gotta bet to win. " . $game->getRollValue());
				}
			
			}
			elseif(in_array($game->getRollValue(), $game->on_crap_array)){
				// end rolls/switch roller
				// Turn on the point and set the value
				$game->clearPoint();
				
				output("New shooter. Point has been turned off.");
			
			}
			
		}
	
	//}

?>
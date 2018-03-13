<?php //FOR TESTING

require('class/chaser.php');
//require('functions/player-randomizer.php');

// for( $i = 80; $i > 70; $i-- ){
//     $skills = random_player_skills($i);
//     $player = new Player();
//     $player->set_skills($skills);
//     $player->save();
// }

$chaser = new Chaser();
var_dump($chaser->get_skills());
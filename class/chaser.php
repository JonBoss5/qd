<?php

require_once('player.php');

Class Chaser extends Player{

    protected $skills = [
        'throw' => null,
        'catch' => null,
        'shoot' => null,
        'off_awareness' => null,
        'def_awareness' => null,
        'tackle' => null,
        'resilience' => null
    ];

    public function __construct($id = null){
        parent::__construct();
        $this->skills = $this->base_skills + $this->skills;
    }

}
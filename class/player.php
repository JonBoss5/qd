<?php

//Ensure database class is required
require_once('db.php');

Class Player {

    private $db;
    private $id;
    private $details;
    protected $base_skills = [
        'speed' => null,
        'leadershpip' => null,
        'stamina' => null,
        'attitude' => null,
        'potential' => null
    ];

    /* 
        Player Class Constructor
        v 1.0
        Accepts a single parameter $id, and populates the
        player object from the database
    */

    public function __construct($id = null){
        $this->db = DB_connection::getDB();
        if($id){
            $this->id = $id;
            $this->pop_details();
            $this->pop_skills();
        }
    }

    /*
        Populate the player's basic details
    */
    private function pop_details(){
        try{
            $query = "SELECT * FROM players WHERE id = :id;";
            $prepared = $this->db->prepare($query);
            $prepared->bindParam(':id', $this->id);
            $results = $prepared->execute();
            $this->details = [
                'first_name' => $results->first_name,
                'last_name' => $results->last_name,
                'country' => $results->country,
                'age' => $results->age
            ];
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
    }

    /* 
        Populate a player's skillistics
    */
    private function pop_skills(){
        try{
            $query = "SELECT * FROM player_skills WHERE player_id = :id;";
            $prepared = $this->db->prepare($query);
            $prepared->bindParam(':id', $this->id);
            $results = $prepared->execute();
            foreach($results as $skill){
                $skills[$skill->skill] = $skill->value;
            }
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
    }

    /*
        Get a single player details by name
    */
    public function get_detail($string){
        if($details[$string]){
            return $details[$string];
        }
        return false;
    }

    /* 
        Get player's skills
    */
    public function get_skills(){
        if($this->skills){
            return $this->skills;
        }
    }

}
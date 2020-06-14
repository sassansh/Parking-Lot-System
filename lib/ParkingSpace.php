<?php
class ParkingSpace{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL SPACES
    public function getAllSpaces(){
        $this->db->query("
            SELECT * 
            FROM parking_space;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET ALL OPEN SPACES
    public function getAllOpenSpaces($lotID){
        $this->db->query("
            SELECT COUNT(Is_Occupied) AS NumberOfOpenSpots
            FROM parking_space;
            WHERE parking_space.Lot_ID = $lotID AND parking_space.Is_Occupied = 'False';
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET SPACE BY LOT_ID AND SPACE_TYPE
    public function getSpaceByLotidAndSpacetype($lotID, $spaceType) {
        $this->db->query("
            SELECT Lot_ID, Space_ID
            FROM parking_space;
            WHERE parking_space.Lot_ID = $lotID AND parking_space.Space_Type = $spaceType;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

}

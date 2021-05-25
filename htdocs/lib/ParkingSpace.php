<?php
class ParkingSpace
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL SPACES
    public function getAllSpaces()
    {
        $this->db->query("
            SELECT * 
            FROM Parking_Space
            ORDER BY LENGTH(Lot_ID), Lot_ID, LENGTH(Space_ID), Space_ID;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET ALL DISTINCT LOT_IDS

    public function getAllDistinctLotIDs()
    {
        $this->db->query("
            SELECT DISTINCT Lot_ID
            FROM Parking_Space;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }
    // GET ALL DISTINCT SPACE_TYPES
    public function getAllDistinctSpaceTypes()
    {
        $this->db->query("
            SELECT DISTINCT Space_Type
            FROM Parking_Space;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET SPACE BY LOT_ID AND SPACE_TYPE
    public function getSpaceByLotidAndSpacetype($lotID, $spaceType)
    {
        $this->db->query("
            SELECT Lot_ID, Space_ID
            FROM Parking_Space
            WHERE Parking_Space.Lot_ID = :Lot_ID AND Parking_Space.Space_Type = :Space_Type;

        ");
        $this->db->bind(':Lot_ID', $lotID);
        $this->db->bind(':Space_Type', $spaceType);

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // INSERT A SPACE WITH LOT_ID AND SPACE_TYPE
    public function insertSpace($data)
    {
        //INSERT QUERY
        $this->db->query("
            INSERT INTO Parking_Space(Lot_ID, Space_Type)
            VALUES(:Lot_ID, :Space_Type);
        ");
        //Bind Data
        $this->db->bind(':Lot_ID', $data['Lot_ID']);
        $this->db->bind(':Space_Type', $data['Space_Type']);
        //EXECUTE
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

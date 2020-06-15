<?php
class ParkingLot{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL PARKING LOTS
    public function getParkingLots(){
        $this->db->query("
            SELECT * 
            FROM Parking_Lot
            ORDER BY Lot_ID;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    public function getParkingLotId($id){
        $this->db->query("
            SELECT * 
            FROM Parking_Lot
            WHERE Parking_Lot.Lot_Id = :lotID;
        ");

        $this->db->bind(':lotID', $id);

        // ASSIGN RESULT SET
        $results = $this->db->single();
        return $results;
    }

    public function findAvailableLots() {
        $this->db->query("
            SELECT Parking_Lot.Lot_ID, Parking_Lot.Address, FreeSpaceCount
            FROM Parking_Lot 
            JOIN 
            (   
                SELECT LOT_ID, COUNT(*) AS FreeSpaceCount
                FROM Parking_Space
                WHERE Is_Occupied = 'False'
                GROUP BY Lot_ID
            ) AS FreeSpaces ON FreeSpaces.Lot_ID = Parking_Lot.Lot_ID
            ORDER BY Lot_ID, FreeSpaceCount DESC;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // DELETE PARKING LOT
    public function delete($id){
        // DELTE QUERY
        $this->db->query("
            DELETE FROM Parking_Lot
            WHERE Parking_Lot.Lot_Id = :lotID;
        ");

        $this->db->bind(':lotID', $id);

        //EXECUTE
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}

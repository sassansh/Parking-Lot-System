<?php
class ParkingPass{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL PARKING PASSES
    public function getAllParkingPasses(){
        $this->db->query("
            SELECT * 
            FROM Parking_Pass;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    public function getParkingPassByCustomerID($id){
        $this->db->query("
            SELECT * 
            FROM Parking_Pass p
            WHERE p.Customer_ID = :id;
        ");

        $this->db->bind(':id', $id);

        // ASSIGN RESULT SET
        $row = $this->db->single();
        return $row;
    }


    // DELETE PARKING PASS
    public function delete($id){
        // DELETE QUERY
        $this->db->query("
            DELETE FROM Parking_Pass
            WHERE Parking_Pass_ID = :id;
        ");

        $this->db->bind(':id', $id);

        //EXECUTE
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}

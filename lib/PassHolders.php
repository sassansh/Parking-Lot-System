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
            FROM parking_pass
            JOIN pass_holder ON parking_pass.customer_id = pass_holder.customer_id;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }
}

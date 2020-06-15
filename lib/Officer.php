<?php
class Officer{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL OFFICERS
    public function getAllOfficers(){
        $this->db->query("
            SELECT * 
            FROM Parking_Lot_Employee e, Officer o
            WHERE e.Employee_ID = o.Employee_ID;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET ALL PASS HOLDERS AND THEIR PASSES
    public function getAllOfficersPatrollingAllLots(){
        $this->db->query("
            SELECT o.Officer_ID, e.First_Name, e.Last_Name, o.Shift
            FROM Parking_Lot_Employee e, Officer o 
            WHERE e.Employee_ID = o.Employee_ID 
            AND NOT EXISTS (SELECT * from Parking_Lot l 
                            WHERE NOT EXISTS (SELECT p.Officer_ID 
                                              FROM Patrols p 
                                              WHERE o.Officer_ID = p.Officer_ID AND l.Lot_ID = p.Lot_ID));
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

     // COUNT ALL OFFICERS
     public function getCountOfOfficers()
     {
         $this->db->query("
             SELECT COUNT(Officer_ID) AS NumberOfOfficers
             FROM officer;
         ");
 
         // ASSIGN RESULT SET
         $results = $this->db->single();
         return $results;
     }

    // DELETE OFFICER
    public function delete($id){
        // DELETE QUERY
        $this->db->query("
            DELETE FROM Officer
            WHERE Officer_ID = '$id';
        ");

        //EXECUTE
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}

<?php
class Fine{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL FINES
    public function getAllFines(){
        $this->db->query("
            SELECT * 
            FROM Fine
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET ALL PASS HOLDERS AND THEIR PASSES
    public function getFinesForPlate($licensePlate){
        $this->db->query("
            SELECT f.Fine_ID, f.Fine_Type, fc.Cost
            FROM Customer c, Fine f, Fine_Type_Cost fc
            WHERE c.Customer_ID = f.Customer_ID AND 
            f.Fine_Type = fc.Fine_Type AND 
            c.License_Plate = :licensePlate;
        ");

        $this->db->bind(':licensePlate', $licensePlate);

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

      // GET ALL PASS HOLDERS AND THEIR PASSES
      public function getFinesByCustomerID($id){
        $this->db->query("
            SELECT *
            FROM Customer c, Fine f, Fine_Type_Cost fc
            WHERE c.Customer_ID = f.Customer_ID AND 
            f.Fine_Type = fc.Fine_Type AND 
            c.Customer_ID = :id;
        ");

        $this->db->bind(':id', $id);

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // DELETE FINE
    public function delete($id){
        // DELETE QUERY
        $this->db->query("
            DELETE FROM Fine
            WHERE Fine_ID = '$id';
        ");

        //EXECUTE
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}

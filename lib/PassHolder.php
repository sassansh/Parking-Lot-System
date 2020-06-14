<?php
class PassHolder{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL PASS HOLDERS
    public function getAllPassHolder(){
        $this->db->query("
            SELECT * 
            FROM Pass_Holder
            JOIN Customer ON Pass_Holder.Customer_ID = Customer.Customer_ID;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET ALL PASS HOLDERS AND THEIR PASSES
    public function getAllPassHolderAndPasses(){
        $this->db->query("
            SELECT * 
            FROM Pass_Holder
            JOIN Customer ON Pass_Holder.Customer_ID = Customer.Customer_ID
            JOIN Parking_Pass ON Parking_Pass.Customer_ID = Pass_Holder.Customer_ID;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // DELETE PASS HOLDER
    public function delete($id){
        // DELTE QUERY
        $this->db->query("
            DELETE FROM Customer
            WHERE Customer_ID = '$id';
        ");

        //EXECUTE
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}

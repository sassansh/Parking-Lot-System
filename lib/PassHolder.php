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
            FROM Pass_Holder;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET ALL PASS HOLDERS AND THEIR PASSES
    public function getAllPassHolders(){
        $this->db->query("
            SELECT * 
            FROM Pass_Holder
            ORDER BY LENGTH(Customer_ID), Customer_ID;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    public function getPassHolderByID($id){
        $this->db->query("
            SELECT * 
            FROM Pass_Holder
            WHERE Customer_ID = :id;
        ");

        $this->db->bind(':id', $id);

        // ASSIGN RESULT SET
        $results = $this->db->single();
        return $results;
    }


    // DELETE PASS HOLDER
    public function delete($id){
        // DELTE QUERY
        $this->db->query("
            DELETE FROM Pass_Holder
            WHERE Customer_ID = :id;
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

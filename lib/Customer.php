<?php
class Customer{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ALL CUSTOMERS
    public function getAllCustomers(){
        $this->db->query("
            SELECT * 
            FROM Customer
            ORDER BY LENGTH(Customer_ID), Customer_ID;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllLicensePlates(){
        $this->db->query("
            SELECT License_Plate
            FROM Customer;
        ");

        // ASSIGN RESULT SET
        $results = $this->db->resultSet();
        return $results;
    }

    // GET CUSTOMER BY LICENSE PLATE
    public function getCustomerByLicensePlate($licensePlate) {
        $this->db->query("
            SELECT * 
            FROM Customer
            WHERE Customer.License_Plate = :licensePlateNum;
        ");

        $this->db->bind(':licensePlateNum', $licensePlate);

        // ASSIGN RESULT SET
        $results = $this->db->single();
        return $results;
    }

    // GET CUSTOMER BY ID
    public function getCustomerByID($id) {
        $this->db->query("
            SELECT * 
            FROM Customer
            WHERE Customer_ID = :id;
        ");

        $this->db->bind(':id', $id);

        // ASSIGN RESULT SET
        $results = $this->db->single();
        return $results;
    }


    // DELETE CUSTOMER
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

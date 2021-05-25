<?php
// The source code for this was from the YouTube Tutorial:
// "Projects In PHP | Creating A Job Lister Website From Scratch | Eduonix"
// https://www.youtube.com/watch?v=LEkjrQMmIK0

// Our Group used this class to initialize our database connection and to execute our queries.
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'parking_lot';

    private $dbh;
    private $error;
    private $stmt;

    public function __construct() {
        // SET DSN
        $dsn = 'mysql:host=' .$this->host. ';dbname='. $this->dbname;

        // SET OPTIONS
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // PDO INSTANCE
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
    
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch(true) {
                case is_int( $value ) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool( $value ) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null( $value ) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        try { 
            return $this->stmt->execute();
        } catch (PDOException $e) { 
            $this->error = $e->getMessage(); // this is not working
        }
    }

    // RETURN ALL RECORDS
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // RETURNS A SINGLE RECORD
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function errorInfo() {
        return $this->error; // I don't think this is working as well
    }
}
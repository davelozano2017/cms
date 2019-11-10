<?php
use Medoo\Medoo;
class Database {
    private $connection;
    protected $dbtype  = db_type; 
    protected $host    = db_host; 
    protected $user    = db_username; 
    protected $pass    = db_password; 
    protected $dbname  = db_name;
    
    public function __construct() {
        $this->connection = new Medoo([
            'database_type' => $this->dbtype,
            'database_name' => $this->dbname,
            'server'        => $this->host,
            'username'      => $this->user,
            'password'      => $this->pass
        ]);
    }
    
    public function connect() {
        return $this->connection;
    }

}


class Model {
    protected $db;
    public function __construct() {
        $connection = new Database();
        $this->db = $connection->connect();   
    }
}


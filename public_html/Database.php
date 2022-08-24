<?php
class Database {
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;
    protected $databaseName;

    function __construct() {
        $this -> serverName = 'mysql';
        $this -> userName = 'root';
        $this -> passCode = 'rootpassword';
        $this -> dbName = 'dbtest';
    }

    function connect()    {
      $dbh = new PDO('mysql:host='. $this->serverName . ';dbname=' . $this->dbName, $this->userName, $this->passCode);
      return $dbh;
    }



}
?>

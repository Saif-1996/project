<?php 
class Db
{
    private  $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "call-center";
    // Create connection
    protected function conn()
    {
        $connect = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($connect->connect_error) {
            die("Connection failed: " . $this->connect->connect_error);
        }
        return $connect;
    }
}

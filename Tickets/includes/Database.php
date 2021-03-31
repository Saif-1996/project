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






// start of user **


class user extends Db
{
    public $name;
    public $pass;
    public $user_id;
    public $per;
    public $query;

    // Insert a row/s in a Database Table
    public function Insert($n, $p, $u, $pe)
    {
        $this->name = $n;
        $this->pass = $p;
        $this->user_id = $u;
        $this->per = $pe;
        $query = "insert into user(name,password,userid,per)
       values ('$n','$p',$u,$p)";

        $this->conn()->query($query);
    }

    // Select a row/s in a Database Table
    public function Select()
    {
        $id = 0;

        if ($id == 0) {
            $query = "select * from user";
        } else {
            $query = "select name,id from user where id=" . $id . "";
        }

        $result = $this->conn()->query($query);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function login($id, $pass)
    {

        $query = "select name,id from user where user-id=" . $id . "and pass='" . $pass . "'";


        $this->conn()->query($query);
    }


    // Update a row/s in a Database Table
    public function Update()
    {
    }

    // Remove a row/s in a Database Table
    public function Remove($id)
    {
        $query = "delete from user where id=$id";
        $this->conn()->query($query);
    }

    // execute statement
    private function executeStatement()
    {
    }
}


// end of user**







// start of case **


class cases extends Db
{
    public $name;
    public $phone;
    public $note;
    public $birth;
    public $social;
    public $type;

    // Insert a row/s in a Database Table
    public function Insert($n, $p, $u, $pe)
    {
        $this->name = $n;
        $this->pass = $p;
        $this->user_id;
        $this->per = $pe;
        $query = "insert into user(name,password,user-id,pre)
   values ('$n','$p','$u,$pe)";
        $this->conn()->query($query);
    }

    // Select a row/s in a Database Table
    public function Select($type)
    {

        $query = "select * from case where type=" . $type . "";



        $this->conn()->query($query);
    }

    // Update a row/s in a Database Table
    public function Update()
    {
    }

    // Remove a row/s in a Database Table
    public function Remove($id, $per)
    {
        if ($per == 1) {
            $query = "delete from user where id=$id";
        } else {
            $query = "delete from user where id=$id";
        }

        $this->conn()->query($query);
    }

    // execute statement
    private function executeStatement()
    {
    }
}

// end of case **
// $n=new user();
// $n->Insert("saif","ss",5,0);
<?php   include ('Database.php') ;?>

<?php

class user extends Db
{
    public $name;
    public $pass;
    public $user_id;
    public $per;
    public $query;


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
  

    // execute statement
    private function executeStatement()
    {
    }
}

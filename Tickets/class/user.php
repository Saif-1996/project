<?php   include ('Database.php') ;?>
<?php   include ('Cases.php') ;?>

<?php

class user extends Db
{
    public $name;
    public $pass;
    public $user_id;
    public $per;
    public $query;


    public function login($pass,$id)
    {

        $query = "select id from user where password='" . $pass . "' and user_id='" . $id . "'";


        $result = $this->conn()->query($query);
        

         $result= $result->fetch_assoc();
               
            if(isset($result["id"]))
           return $result;
           else
               return 0;
           
    }


    // Update a row/s in a Database Table
    public function AddCase($user_id,$name,$national_id,$birth,$phone,$note,$type)
    {
        $case=new cases();
$case->name=$name;
$case->national=$national_id;
$case->phone=$phone;
$case->birth=$birth;
$case->note=$note;
$case->type=$type;
$case->user_id=$user_id;
$case->date=date("d/m/Y");
$case->Insert();
    }
    public function GetAll()
    {

        $query = "select * from cases INNER JOIN user ON cases.user_id=user.id";

    
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

    // Remove a row/s in a Database Table
  

    // execute statement
    private function executeStatement()
    {
    }
}

<?php   include_once ('Database.php') ;?>


<?php

class Cases extends Db{
    public $name;
    public $note;
    public $national;
    public $phone;
    public $user_id;
    public $type;
    public $birth;
    public $date;


    public function Insert(){
       
        $query = "insert into cases(user_id,name,national_id,birth,phone,note,type,date)
        values ('$this->user_id','$this->name',$this->national,'$this->birth',$this->phone,'$this->note',$this->type,'$this->date')";
        $this->conn()->query($query);
           
    }


    // Update a row/s in a Database Table
    public function GetAll()
    {


        $query = "select * from cases";
    
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

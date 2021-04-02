<?php   include ('user.php') ;?>
<?php

class admin extends user
{
    
    // Insert a row/s in a Database Table
    public function AddEmployee($n, $p, $u, $pe)
    {
        $this->name = $n;
        $this->pass = $p;
        $this->user_id = $u;
        $this->per = $pe;
        $query = "insert into user(emp_name,password,user_id,per)
       values ('$n','$p',$u,$pe )";
// return 0;
        $this->conn()->query($query);
        // return ("query is".$this->conn()->err);
        // else
        // return("Done!!@");
    }

    // Select a row/s in a Database Table
    public function GetAllUser()
    {
    
      $query = "select * from user";
    
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
    

    public function GetOne($id){
        $query = "select * from user where id=$id";
    
        $result = $this->conn()->query($query);
        

         $data= $result->fetch_assoc();
               
            
           return $data;
       
    }

        

    public function GetOneCase($id){
        $query = "select * from cases where case_id=$id";
    
        $result = $this->conn()->query($query);
        

         $data= $result->fetch_assoc();
               
            
           return $data;
       
    }




    // Update a row/s in a Database Table
    public function UpdateUser($id,$n, $p, $u, $pe){
        $query = "update  user set emp_name ='$n',
        password='$p',
        user_id='$u',
        per='$pe'
        where id = $id";
        $this->conn()->query($query);
    
    
    }

    // Remove a row/s in a Database Table
    public function RemoveUser($id)
    {
        $query = "delete from user where id=$id";
        $this->conn()->query($query);
    }

    // execute statement
    private function executeStatement()
    {
    }
}

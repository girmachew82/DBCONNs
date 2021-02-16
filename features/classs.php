<?php

class MySQLRepository extends DBCommonMethod implements IRepository{
	public $conn;
    public function __construct($host,$user,$pass,$dbname){
        parent::__construct($host,$user,$pass,$dbname);
      
    }
    public function db_connect()
    {
        $this->conn = null;
                try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
    
    public function insert($data)
    {
        $name ="Abebe";
        $pass = "abespass";
        $sql_insert = $conn->prepare("INSERT INTO tbluser (`name`,`pass`)
        VALUES(:name,:pass)
            ");
            $sql_insert ->bindParam(':name',$name);
            $sql_insert ->bindParam(':pass',$pass);
            $sql_insert->execute();
            $sql_insert = $conn->lastInsertId();
            if($sql_insert >0)
            {
                return "Registered successfully";
            }
            else{
                return "Not registered";
              }    
            }

    public function read()
    {
     ?>
            <h1>Accounts</h1>
            Search <input type="search" name="search" id="">
            <table>
            <thead>
            <tr>
            <th>NO</th>
            <th>Name</th>
            <th>Password</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql_select = $this->conn->prepare("SELECT * FROM tbluser");
            $sql_select->execute();
            $results = $sql_select->fetchAll(PDO::FETCH_OBJ);
            $i=0;
            foreach($results as $result )
            {
   
            
            $i++;
            ?>
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo  $result ->name;?></td>
            <td><?php echo $result ->pass;?></td>
            <td><?php echo"<a href ='edit.php?id=$result->id&name=$result->name&pass=$result->pass'>Edit"?>|<?php echo"<a href='delete.php?id=$result->id'>Delete";?></td>
            </tr>
            <?php
             }
  $conn =null;
    }

    public function update($data)
    {
        return "Update data ";
    }
    public function delete($data){
       return "Delete data ";
    }
}


?>
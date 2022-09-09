<?php

class Dbconfig
{
  //database parameters
    public $dbhost="localhost";
    public $dbuser="root";
    public $dbpassword="";
    public $dbname="db_test";

// function to connect to database
    function connect_db(){
        $conn = new mysqli($this->dbhost, $this->dbuser,$this->dbpassword,$this->dbname);
        if($conn->connect_error){

        die('<h1 style="color:red;text-align:center;margin-top:50px;"><p style="display:inline-block;border:2px dashed red;padding:15px; ">Database Connection Failed !!!</p></h1>');
        }
        else{
            return $conn;
        }

    }  
}

?>
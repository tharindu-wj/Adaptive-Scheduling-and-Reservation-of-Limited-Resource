<?php
class Database
{
    public $con;
    public function __construct()
    {
        $this->con = mysqli_connect("localhost","root","","project");
        if($this->con)
        {
            //echo "Connected";
        }
        else
        {
            //echo "Connection failed";
        }
    }
}

//$obj = new Database;
?>
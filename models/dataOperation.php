<?php
include "db.php";

class DataOperation extends Database
{
    public function insert_record($table,$fields)
    {
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= "(".implode(",", array_keys($fields)).") VALUES ";
        $sql .= "('".implode("','", array_values($fields))."')";

        //echo $sql;
        $query = mysqli_query($this->con,$sql);
        if($query){
            return true;
        }

    }

    public function view_record($table){
        $sql = "SELECT * FROM ".$table;
        //echo $sql;
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function select_record($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5 );

        $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
        //echo $sql;
        $query = mysqli_query($this->con, $sql) or die("Can't execute ".mysqli_error($this->con));
        $row = mysqli_fetch_array($query);
        return $row;
    }

    public function update_record($table, $where, $fields){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "='".$value . "' AND ";
        }
        $condition = substr($condition, 0, -5 );
        foreach ($fields as $key => $value) {
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql, 0, -2 );
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
        //echo $sql;
        if(mysqli_query($this->con,$sql)){
            return true;
        }
    }

    public function delete_record($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5 );
        $sql = "DELETE FROM ".$table." WHERE ".$condition;
        if(mysqli_query($this->con,$sql)){
            return true;
        }
        //echo $sql;
    }
}
/*
$obj = new DataOperation;

if(isset($_POST['submit']))
{
    $myarray = array(
        "m_name" => $_POST['name'],
        "qty" => $_POST['qty']
    );

    if($obj->insert_record(medicine,$myarray)){
        header("location:../lecturer.php?msg=Record Inserted");
    }

    else{
        header("location:../lecturer.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){
    $id = $_POST['id'] ?? null;
    $where = array("m_id"=>$id);
    $myarray = array(
        "m_name" => $_POST['name'],
        "qty" => $_POST['qty']
    );
    if($obj->update_record("medicine", $where, $myarray)){
        header("location:../lecturer.php?msg=Record Updated Successfully");
    }

    else{
        header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"] ?? null;
    $where = array("m_id"=>$id);
    if($obj->delete_record("medicine",$where)){
        header("location:../lecturer.php?msg=Record Deleted Successfully");
    }

    else{
        header("location:../lecturer.php?msg=Delete Failed");
    }
}
*/

?>
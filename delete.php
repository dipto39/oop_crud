<?php 
require("database.php");
$obj = new database();
$id=$_POST['id'];
if($obj->delete("user","id = $id")){
    echo "Data deleted successful";
}else{
    echo "Something went worong";
}
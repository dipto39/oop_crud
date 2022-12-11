<?php
require("database.php");
$obj = new database();
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['addr'];


if ($obj->insert("user", ['name' => $name, 'email' => $email, 'address' => $address])) {
    echo "data inserted successful";
}else{
    echo "something went wrong";
}

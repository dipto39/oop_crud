<?php

require("database.php");
$obj = new database();
if (isset($_POST['gateform'])) {
    $id = $_POST['gateform'];
    if ($obj->select("user", null, null, "id = $id", null, null)) {
        $result = $obj->show_result();
        $data = '<div class="popup_content">
        <h3>Fill out the form</h3>
        <form id="uform" action="" method="post">
        <label for="id">id
                <input type="hidden" id="id" value="' . $result[0][0]['id'] . '" >
            </label>
            <label for="uname">Name
                <input type="text" name="uname" value="' . $result[0][0]['name'] . '" id="uname">
            </label>
            <label for="uemail">Email
                <input type="email" name="uemail" value="' . $result[0][0]['email'] . '" id="uemail">
            </label>
            <label for="uaddress">Address
                <input type="text" name="uaddr" value="' . $result[0][0]['address'] . '" id="uaddress">
            </label>
            <div class="button">
                <input type="button" class="can" value="Cancel">
                <input type="submit" class="update" value="update">

            </div>
        </form>
    </div>';
        echo $data;
    } else {
        echo "failed";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['addr'];


    if ($obj->update("user", ['name' => $name, 'email' => $email, 'address' => $address],"id = $id")) {
        echo "data Update successful";
    } else {
        echo "something went wrong";
    }
}

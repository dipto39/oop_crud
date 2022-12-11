<?php
require("database.php");
$obj = new database;
$obj->pagi("user", null, null, null, null,null);
$result = $obj->show_result();
if ($result[0] > 0) {
    $result = $result[0];
    $i = 1;
    $data = "";
    foreach ($result as $val) {
        $data .= '<tr>
        <td>' . $i . '</td>
        <td>' . $val['name'] . '</td>
        <td>' . $val['email'] . '</td>
        <td>' . $val['address'] . '</td>
        <td class="action"><button class="edit" data-attr="' . $val['id'] . '">Edit</button><button class="delete"  data-attr="' . $val['id'] . '">Delete</button></th>
    </tr>';
        $i++;
    }
    
    echo $data;
}else{
    echo "<tr colspan='5'>No record found...! </tr>";
}

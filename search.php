<?php
require('database.php');
$obj = new database();
$val = $_POST['keyval'];
$data = "";
if ($obj->select("user", null, null, "name like '%$val%'", null, null)) {
    $result = $obj->show_result();

    if (count($result[0]) > 0) {
        $result = $result[0];
        $i=1;
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
        echo "<td colspan='5' > no record found..!f</td>";
    }
}

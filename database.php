<?php
class database
{
    private $host = "localhost";
    private $dbname = "laravel";
    private $uname = "root";
    private $pass = "";
    private $con = false;
    private $result = [];
    private $mysqli = "";

    // make connection with construct function

    public function __construct()
    {
        if ($this->con == true) {
            return true;
        } else {
            $this->mysqli = new mysqli($this->host, $this->uname, $this->pass, $this->dbname);
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return $this->result;
            } else {
                return true;
            }
        }
    }

    // Insert function 
    public function insert($table, array $arr)
    {
        if ($this->tableExist($table)) {
            $sql = "insert into $table(";
            $k = "";
            $val = "";
            $aritem = count($arr);
            $i = 0;
            foreach ($arr as $key => $value) {
                $k .= $key;
                if (++$i === $aritem) {
                    $k .= "";
                    $val .= $value . "'";
                } else {
                    $k .= ",";
                    $val .= $value . "','";
                };
            }
            $sql .= $k . ") values('" . $val . ")";
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }

    // update data 
    public function update($table, array $arr, $where = null)
    {
        if ($this->tableExist($table)) {
            $ar = [];
            foreach ($arr as $key => $value) {
                array_push($ar, $key . "= '" . $value . "'");
            }
            $sql = "update $table set " . implode(",", $ar);
            if (!$where == null) {
                $sql .= " where $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }

    // Delete  data 
    public function delete($table, $where = null)
    {
        if ($this->tableExist($table)) {
            $sql = "delete from $table";
            if ($where == null) {
            } else {
                $sql .= " where $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result, "Data remove successfully..");
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }





    // show query result

    public function show_result()
    {
        $response = $this->result;
        $this->result = [];
        return $response;
    }


    // check Table Exist or not

    protected function tableExist($table)
    {
        $tb = $this->mysqli->query("SHOW TABLES LIKE '" . $table . "'");
        if ($tb) {
            if ($tb->num_rows > 0) {
                return true;
            } else {
                array_push($this->result, "Thare is no table like $table");
                return false;
            }
        }
    }
    // pagination section 
    public function pagi($table, $clm = null, $join = null, $where = null, $order = null, $limit = null)
    {
        if ($this->tableExist($table)) {
            $sql = "select";
            if (!$clm == null) {
                $sql .= " $clm from $table";
            } else {
                $sql .= " * from $table";
            }

            if (!$join == null) {
                $sql .= " inner join $join";
            }
            if (!$where == null) {
                $sql .= " where $where";
            }
            if (!$order == null) {
                $sql .= " order by $order";
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            if (!$limit == null) {
                $sql .= " limit $offset,$limit";
            }
            $res = $this->mysqli->query($sql);
            if ($res) {
                array_push($this->result, $res->fetch_all(MYSQLI_ASSOC));
                return true;
            } else {
                array_push($this->result, "Thare is no table like $table");
                return false;
            }
        }
    }
   // select section 
   public function select($table, $clm = null, $join = null, $where = null, $order = null, $limit = null)
   {
       if ($this->tableExist($table)) {
           $sql = "select";
           if (!$clm == null) {
               $sql .= " $clm from $table";
           } else {
               $sql .= " * from $table";
           }

           if (!$join == null) {
               $sql .= " inner join $join";
           }
           if (!$where == null) {
               $sql .= " where $where";
           }
           if (!$order == null) {
               $sql .= " order by $order";
           }
           if (isset($_GET['page'])) {
               $page = $_GET['page'];
           } else {
               $page = 1;
           }
           $offset = ($page - 1) * $limit;
           if (!$limit == null) {
               $sql .= " limit $offset,$limit";
           }
           $res = $this->mysqli->query($sql);
           if ($res) {
               array_push($this->result, $res->fetch_all(MYSQLI_ASSOC));
               return true;
           } else {
               array_push($this->result, "Thare is no table like $table");
               return false;
           }
       }
   }


    // this for close connection 

    public function __destruct()
    {
        if ($this->con == true) {
            if ($this->mysqli->close()) {
                return true;
            }
        } else {
            return false;
        }
    }
}

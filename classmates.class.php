<?php 
Class Classmates
{
    private $db;
    public function __construct() {
        $this->db = $this->conn();
    }
    private function conn() {
        $config = require_once './config.php';
        $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function Insert($data) {

        $con = "insert into classmates(stdid,name,sex,class,major_num,major_name,college,grade,status) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";
        $res = $this->db->query($con);
        if($res) {
            return 1;
        }else {
            return 0;
        }
    }

}
?>
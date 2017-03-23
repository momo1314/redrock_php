<?php
header("Content-Type: text/html; charset=UTF-8");
require_once './classmates.class.php';
$url = "jwzx.cqupt.edu.cn/jwzxtmp/showBjStu.php?bj=";
$class = '04921601';//$_POST['class'];
$url = $url.$class;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$output = curl_exec($ch);
curl_close($ch);
if(preg_match_all("/<td>(.*?)<\/td>/i", $output, $matches)){
    $sql = new Classmates();
    $x = 10;
    try {
        while(1) {
            if(@$matches[1][$x] == NULL) {
                break;
            }
            $data = array();
            for($k = 1; $k < 10; $k++) {
                $data[] = $matches[1][$x + $k];
            }
            $status = $sql->Insert($data);
            if($status) {
                $x = $x +10;
            } else {
                echo "添加失败";
                break;
            }
        }
    } catch (Exception $e) {
        echo $e;
        echo 'over';
    }
    echo "over";
} else {
    echo 'no match!';
}
?>
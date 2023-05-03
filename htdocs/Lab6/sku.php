<?php

//open database by PDO
$dbms='sqlite';     //DBMS type
$host=''; //Host name
$dbName='mysqlitedb.db';    //database name
$user='';      //database user
$pass='';          //database password
$dsn="$dbms:$dbName";

try {
    $con = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

//a safe method to recieve get data
function myget($str) { 
    $val = !empty($_GET[$str]) ? $_GET[$str] : '';
    return $val;
}       

//a safe method to recieve post data
function mypost($str) { 
    $val = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $val;
}

if(isset($_GET['spu'])&& isset($_GET['info_1']) && isset($_GET['info_2'])) {
    $spu = $_GET['spu'];
    $info_1 = $_GET['info_1'];
    $info_2 = $_GET['info_2'];
    $sql = 'SELECT * FROM sku WHERE spu_id='.$spu.' AND info_1="'.$info_1.'" AND info_2="'.$info_2.'"';
    $sku = $con->query($sql)->fetch();
    if($sku){
        $data["price"] = $sku["price"];
        $data["stock"] = $sku["stock"];
        $data["sku"] = $sku["id"];
        $result["code"] = 200;
        $result["message"] = "OK";
        $result["data"] = $data;
        echo json_encode($result);
    } else {
        $result["code"] = 404;
        $result["message"] = "SKU NOT FOUND";
        echo json_encode($result);
    }
} else {
    $result["code"] = 500;
    $result["message"] = "PARAMTER ERROR";
    echo json_encode($result);
}

?>
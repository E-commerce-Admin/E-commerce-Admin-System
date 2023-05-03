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

if (isset($_POST['login'])) {
    $username = mypost('username');
    $password = mypost('password');
    $sql = "SELECT count(*) FROM user WHERE username='$username' AND password='$password'";
    $count = $con->query($sql)->fetchColumn();
    if ($count==1) {
        session_start(); // magic word to start a session.
        $_SESSION['username'] = $username; 
        $result["code"] = 200;
        $result["message"] = "OK";
        echo json_encode($result);
    } else {
        $result["code"] = 404;
        $result["message"] = "Username or password error!";
        echo json_encode($result);
    }
}

?>


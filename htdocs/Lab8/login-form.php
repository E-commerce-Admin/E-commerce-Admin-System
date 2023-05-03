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

//a safe method to recieve post data
function mypost($str) { 
    $val = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $val;
}

if(!empty($_SERVER['HTTP_REFERER'])){
    $expire = time() + 60*60*24;
    $referer_url = $_SERVER['HTTP_REFERER'];
    $count = count(explode('login', $referer_url));
    if($count == 1) {
        setcookie("url", $referer_url, $expire, "/");
    }
}

session_start(); // magic word to start/reuse a session.

if (isset($_POST['login'])) {
    $username = mypost('username');
    $password = mypost('password');
    $sql = "SELECT count(*) FROM user WHERE username= ? AND password= ? ";
//    $count = $con->query($sql)->fetchColumn();
    $query = $con->prepare($sql);
    $query->execute(array($username, $password));
    $count = $query->fetchColumn();
    if ($count==1) {
        $_SESSION['username'] = $username; 
    } else {
        echo '<script type="text/javascript"> alert("Username or password error!"); </script>';
    }
}

function login() {
    if(!empty($_SESSION['username'])) {
        $url = $_COOKIE["url"];
        echo '<script type="text/javascript"> alert("login success!"); window.location.href="'.$url.'"; </script>';
    } else {
        echo <<<EOT
        <h2> </h2>
        <div class="col-lg-8" style="text-align:center"><!-- container begin -->
            <form action="" class="well" method="post"><!-- form begin -->
                <h2 class="form-login-heading text-center"> Login demo </h2>
                <br>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
                <br>
                <input type="password" class="form-control" placeholder="Your Password" name="password" required>
                <br>
                <button class="btn btn-primary" type="submit" name="login">Login</button>
            </form><!-- form finish -->
        </div><!-- container finish --> 
    EOT;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Login Demo</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</head>
<body>

<?php login() ?>

</body>
</html>

<?php
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        echo "<script>alert('Username cannot be empty');location.href='../pages/login.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password cannot be empty');location.href='../pages/login.php';</script>";
    } else {
        include "connect_db.php";
        $qry_login = mysqli_query($conn, "select * from user where username = '" . $username . "' and password = '" . $password . "'");
        if (mysqli_num_rows($qry_login) > 0) {
            $dt_login = mysqli_fetch_array($qry_login);
            if ($dt_login['authority'] == 3) {
                echo "<script>alert('You do not have permission to access the admin system.');location.href='../pages/login.php';</script>";
            } else {
                session_start();
                $_SESSION['id_user'] = $dt_login['id_user'];
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['status_login'] = true;
                header("location: ../pages/dashboard.php");
            }
        } else {
            echo "<script>alert('Invalid username and password');location.href='../pages/login.php';</script>";
        }
    }
}
?>
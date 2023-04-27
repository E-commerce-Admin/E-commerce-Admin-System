<?php
if ($_POST) {
    $id_admin = $_POST['id_admin'];
    $name_admin = $_POST['name_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($id_admin)) {
        echo "<script>alert('id admin must not
    empty');location.href='../pages/admin.php';</script>";
    } elseif (empty($name_admin)) {
        echo "<script>alert('nama admin must not
        empty');location.href='../pages/admin.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username must not
        empty');location.href='../pages/admin.php';</script>";
    } else {
        include "connect_db.php";
        $insert = mysqli_query($conn, "insert into admin
    (id_admin,name_admin, username, password)
    value
    ('" . $id_admin . "','" . $name_admin . "','" . $username . "','" . $password . "')") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Success add admin');location.href='../pages/admin.php';</script>";
        } else {
            echo "<script>alert('Failed add admin');location.href='../pages/admin.php';</script>";
        }
    }
}
?>
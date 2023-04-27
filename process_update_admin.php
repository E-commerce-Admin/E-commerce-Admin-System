<?php
    if($_POST){
        $id_admin=$_POST['id_admin'];
        $name_admin=$_POST['name_admin'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        // $level=$_POST['level'];
            if(empty($name_admin)){
                echo "<script>alert('admin's name cannot be empty');location.href='../pages/update_admin.php';</script>";
            } elseif(empty($username)){
                echo "<script>alert('username cannot be empty');location.href='../pages/update_admin.php';</script>";
            } else {
                include "connect_db.php";
                $update=mysqli_query($conn,"update admin set name_admin='".$name_admin."',username='".$username."',password='".$password."',
                id_admin='".$id_admin."' where id_admin = '".$id_admin."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Successful update of admin');location.href='../pages/admin.php';</script>";
            } else {
                echo "<script>alert('Failed to update admin');location.href='../pages/update_admin.php?id_admin=".$id_admin."';</script>";
            }
        }
    }
?>
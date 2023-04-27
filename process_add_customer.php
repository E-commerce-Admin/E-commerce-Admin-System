<?php
if ($_POST) {
$id_customer=$_POST['id_customer'];
$name=$_POST['name'];
$address_city=$_POST['address_city'];
$phone=$_POST['phone'];

if(empty($id_customer)){
    echo "<script>alert('id customers must not be
    empty');location.href='../pages/customer.php';</script>";
    } elseif(empty($name)){
    echo "<script>alert('nama customers must not be
    empty');location.href='../pages/customer.php';</script>";
    } elseif(empty($phone)){
    echo "<script>alert('phone number must not be
    empty');location.href='../pages/customer.php';</script>";
    } else {
    include "connect_db.php";
    $insert=mysqli_query($conn,"insert into customer
    (id_customer,name, address_city, phone)
    value
    ('".$id_customer."','".$name."','".$address_city."','".$phone."')") or
    die(mysqli_error($conn));
if($insert){
    //header("location : tambah_pelanggan.php");
    echo "<script>alert('Successfully add a customer');location.href='../pages/customer.php';</script>";
} else {
    echo "<script>alert('Failed to add a customer');location.href='../pages/customer.php';</script>";
}
}
}
?>
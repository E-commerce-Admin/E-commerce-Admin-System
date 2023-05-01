<?php
if ($_POST) {
    $id_customer = $_POST['id_customer'];
    $name = $_POST['name'];
    $address_city = $_POST['address_city'];
    $address_district = $_POST['address_district'];
    $address_street = $_POST['address_street'];
    $zip_code = $_POST['zip_code'];
    $phone = $_POST['phone'];

    if (empty($id_customer)) {
        echo "<script>alert('Customer ID must not be
    empty');location.href='../pages/address.php';</script>";
    } elseif (empty($name)) {
        echo "<script>alert('Customer name must not be
    empty');location.href='../pages/address.php';</script>";
    } elseif (empty($address_city)) {
        echo "<script>alert('Customer address city must not be
    empty');location.href='../pages/address.php';</script>";
    } elseif (empty($address_district)) {
        echo "<script>alert('Customer address district must not be
    empty');location.href='../pages/address.php';</script>";
    } elseif (empty($address_street)) {
        echo "<script>alert('Customer address street must not be
    empty');location.href='../pages/address.php';</script>";
    } elseif (empty($zip_code)) {
        echo "<script>alert('Customer zip code must not be
    empty');location.href='../pages/address.php';</script>";
    } elseif (empty($phone)) {
        echo "<script>alert('Customer phone number must not be
    empty');location.href='../pages/address.php';</script>";
    } else {
        include "connect_db.php";
        $insert = mysqli_query($conn, "insert into customer
    (id_customer, name, address_city, address_district, address_street, zip_code, phone)
    value
    ('" . $id_customer . "','" . $name . "','" . $address_city . "','" . $address_district . "','" . $address_street . "','" . $zip_code . "','" . $phone . "')") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Successfully add a customer');location.href='../pages/address.php';</script>";
        } else {
            echo "<script>alert('Failed to add a customer');location.href='../pages/address.php';</script>";
        }
    }
}
?>
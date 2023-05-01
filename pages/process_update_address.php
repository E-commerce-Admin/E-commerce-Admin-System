<?php
if ($_POST) {
    $id_customer = $_POST['id_customer'];
    $name = $_POST['name'];
    $address_city = $_POST['address_city'];
    $address_district = $_POST['address_district'];
    $address_street = $_POST['address_street'];
    $zip_code = $_POST['zip_code'];
    $phone = $_POST['phone'];
    if (empty($name)) {
        echo "<script>alert('Customer name cannot be empty');location.href='../pages/update_address.php';</script>";
    } elseif (empty($address_city)) {
        echo "<script>alert('Customer address city cannot be empty');location.href='../pages/update_address.php';</script>";
    } elseif (empty($address_district)) {
        echo "<script>alert('Customer address district cannot be empty');location.href='../pages/update_address.php';</script>";
    } elseif (empty($address_street)) {
        echo "<script>alert('Customer address street cannot be empty');location.href='../pages/update_address.php';</script>";
    } elseif (empty($zip_code)) {
        echo "<script>alert('Customer address zip code cannot be empty');location.href='../pages/update_address.php';</script>";
    } elseif (empty($phone)) {
        echo "<script>alert('Customer phone cannot be empty');location.href='../pages/update_address.php';</script>";
    } else {
        include "connect_db.php";
        $update = mysqli_query($conn, "update customer set name='" . $name . "',address_city='" . $address_city
            . "',address_district='" . $address_district . "',address_street='" . $address_street . "',zip_code='" . $zip_code . "',
                phone='" . $phone . "',id_customer='" . $id_customer . "' where id_customer = '" . $id_customer . "'") or die(mysqli_error($conn));
        if ($update) {
            echo "<script>alert('Update customer successfully!');location.href='../pages/address.php';</script>";
        } else {
            echo "<script>alert('Update customer failed!');location.href='../pages/update_address.php?id_customer=" . $id_customer . "';</script>";
        }
    }
}
?>
<?php
if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address_city = $_POST['address_city'];
    $phone = $_POST['phone'];
    if (empty($name)) {
        echo "<script>alert('name cannot be empty');location.href='../pages/update_customer.php';</script>";
    } elseif (empty($address_city)) {
        echo "<script>alert('address_city cannot be empty');location.href='../pages/update_customer.php';</script>";
    } elseif (empty($phone)) {
        echo "<script>alert('phone cannot be empty');location.href='../pages/update_customer.php';</script>";
    } else {
        include "connect_db.php";
        $update = mysqli_query($conn, "update customer set name='" . $name . "',address_city='" . $address_city . "',
                phone='" . $phone . "',id='" . $id . "' where id = '" . $id . "'") or die(mysqli_error($conn));
        if ($update) {
            echo "<script>alert('Update customer successfully!');location.href='../pages/customer.php';</script>";
        } else {
            echo "<script>alert('Update customer failed!');location.href='../pages/update_customer.php?id_customer=" . $id . "';</script>";
        }
    }
}
?>
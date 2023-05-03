<?php
if ($_POST) {
    $id_user_address = $_POST['id_user_address'];
    $customer_name = $_POST['customer_name'];
    $shipping_address = $_POST['shipping_address'];

    if (empty($customer_name)) {
        echo "<script>alert('Customer name cannot be empty');location.href='../pages/update_address.php?id_user_address=" . $id_user_address . "';</script>";
    } elseif (empty($shipping_address)) {
        echo "<script>alert('Shipping address cannot be empty');location.href='../pages/update_address.php?id_user_address=" . $id_user_address . "';</script>";
    } else {
        include "connect_db.php";
        $update = mysqli_query($conn, "UPDATE user_address SET customer_name='" . $customer_name . "', shipping_address='" . $shipping_address . "' WHERE id_user_address='" . $id_user_address . "'") or die(mysqli_error($conn));
        if ($update) {
            echo "<script>alert('Update address successfully!');location.href='../pages/address.php';</script>";
        } else {
            echo "<script>alert('Update address failed!');location.href='../pages/update_address.php?id_user_address=" . $id_user_address . "';</script>";
        }
    }
}
?>
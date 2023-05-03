<?php
if ($_POST) {
    $id_coupon = $_POST['id_coupon'];
    $coupon_name = $_POST['coupon_name'];
    $id_product = $_POST['id_product'];
    $discount = $_POST['discount'];
    $validity = $_POST['validity'];
    $deadline = $_POST['deadline'];

    // Check if any required fields are empty
    $error_messages = array();
    if (empty($id_coupon)) {
        $error_messages[] = "Coupon ID is required.";
    }
    if (empty($coupon_name)) {
        $error_messages[] = "Coupon name is required.";
    }
    if (empty($id_product)) {
        $error_messages[] = "Product name is required.";
    }
    if (empty($discount)) {
        $error_messages[] = "Coupon discount is required.";
    }
    if ($validity != 0 && empty($validity)) {
        $error_messages[] = "Coupon validity is required.";
    }
    if (empty($deadline)) {
        $error_messages[] = "Coupon deadline is required.";
    }

    if (!empty($error_messages)) {
        $error_message = implode("<br>", $error_messages);
        echo "<script>alert('Error: " . $error_message . "');location.href='../pages/coupon.php';</script>";
    } else {
        include "connect_db.php";
        $query = mysqli_query($conn, "UPDATE coupon SET coupon_name='" . $coupon_name . "', id_product='" . $id_product . "', discount='" . $discount . "', is_valid='" . $validity . "', deadline='" . $deadline . "' WHERE id_coupon='" . $id_coupon . "'");
        if ($query) {
            echo "<script>alert('Coupon updated successfully.');location.href='../pages/coupon.php';</script>";
        } else {
            echo "<script>alert('Failed to update coupon.');location.href='../pages/coupon.php';</script>";
        }
    }
}
?>
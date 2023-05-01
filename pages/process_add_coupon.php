<?php
if ($_POST) {
    $id_coupon = $_POST['id_coupon'];
    $coupon_name = $_POST['coupon_name'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
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
    if (empty($product_name)) {
        $error_messages[] = "Product name is required.";
    }
    if (empty($price)) {
        $error_messages[] = "Coupon price is required.";
    }
    if (empty($validity)) {
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
        $query = mysqli_query($conn, "INSERT INTO coupon (id_coupon, id_user, product_name, coupon_name, price, discount, is_valid, is_delete, create_time, deadline) VALUES ('" . $id_coupon . "', NULL, '" . $product_name . "', '" . $coupon_name . "', '" . $price . "', '" . $discount . "', 1, 0, CURRENT_TIMESTAMP(), '" . $deadline . "')");
        if ($query) {
            echo "<script>alert('Coupon added successfully.');location.href='../pages/coupon.php';</script>";
        } else {
            echo "<script>alert('Failed to add coupon.');location.href='../pages/coupon.php';</script>";
        }
    }
}

?> 
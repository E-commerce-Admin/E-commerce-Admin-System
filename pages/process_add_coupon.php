<?php
session_start();
if ($_SESSION['status_login'] != true) {
  header('location: login.php');
}
?>
<?php
if ($_POST) {
    $id_coupon = $_POST['id_coupon'];
    $coupon_name = $_POST['coupon_name'];
    $product_name = $_POST['product_name'];
    $discount = $_POST['discount'];
    $deadline = $_POST['deadline'];
    $creator = $_SESSION['username'];
    $id_creator = $_SESSION['id_user'];

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
    if (empty($discount)) {
        $error_messages[] = "Coupon discount is required.";
    }
    if (empty($deadline)) {
        $error_messages[] = "Coupon deadline is required.";
    }

    if (!empty($error_messages)) {
        $error_message = implode("<br>", $error_messages);
        echo "<script>alert('Error: " . $error_message . "');location.href='../pages/coupon.php';</script>";
    } else {
        include "connect_db.php";
        $query = mysqli_query($conn, "INSERT INTO coupon (id_coupon, product_name, coupon_name, discount, is_valid, is_delete, create_time, deadline, creator, id_creator) VALUES ('" . $id_coupon . "', '" . $product_name . "', '" . $coupon_name . "', '" . $discount . "', 1, 0, CURRENT_TIMESTAMP(), '" . $deadline . "', '".$_SESSION['username']."', '".$_SESSION['id_user']."')");
        if ($query) {
            echo "<script>alert('Coupon added successfully.');location.href='../pages/coupon.php';</script>";
        } else {
            echo "<script>alert('Failed to add coupon: " . mysqli_error($conn) . "');location.href='../pages/coupon.php';</script>";
        }
    }
}
?>
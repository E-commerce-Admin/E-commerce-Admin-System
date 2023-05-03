<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
}
?>
<?php
if ($_POST) {
    $id_address_customer = $_POST['customer_name'];
    $shipping_address = $_POST['shipping_address'];

    if (empty($id_address_customer)) {
        echo "<script>alert('Customer id must not be empty');location.href='../pages/address.php';</script>";
    } elseif (empty($shipping_address)) {
        echo "<script>alert('Shipping address must not be empty');location.href='../pages/address.php';</script>";
    } else {
        include "connect_db.php";

        // Get the customer id based on the customer name selected
        $customer_query = mysqli_query($conn, "SELECT id_user, username FROM user WHERE id_user='" . $id_address_customer . "' AND authority = 3 LIMIT 1");
        $customer = mysqli_fetch_assoc($customer_query);

        if ($customer != null) {
            $id_customer = $customer['id_user'];
            $customer_name = $customer['username'];
            $id_creator = $_SESSION['id_user'];

            $insert = mysqli_query($conn, "INSERT INTO user_address (id_customer, customer_name, shipping_address, create_time, id_creator) 
            VALUES ('" . $id_customer . "', '" . $customer_name . "', '" . $shipping_address . "', CURRENT_TIMESTAMP, '" . $id_creator . "')") or die(mysqli_error($conn));

            if ($insert) {
                echo "<script>alert('Successfully added an address');location.href='../pages/address.php';</script>";
            } else {
                echo "<script>alert('Failed to add an address');location.href='../pages/address.php';</script>";
            }
        } else {
            echo "<script>alert('Could not find customer with id: " . $id_address_customer . "');location.href='../pages/address.php';</script>";
        }
    }
}
?>
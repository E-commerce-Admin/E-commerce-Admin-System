<?php
if ($_GET['id_customer']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "UPDATE customer SET is_delete = 1, delete_time = NOW() WHERE id_customer='" . $_GET['id_customer'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Customer deleted successfully.');location.href='../pages/customer.php';</script>";
    } else {
        echo "<script>alert('Failed to delete customer.');location.href='../pages/customer.php';</script>";
    }
}
?>
<?php
if ($_GET['id_user_address']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "UPDATE user_address SET is_delete = 1, delete_time = NOW() WHERE id_user_address='" . $_GET['id_user_address'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Customer deleted successfully.');location.href='../pages/address.php';</script>";
    } else {
        echo "<script>alert('Failed to delete customer.');location.href='../pages/address.php';</script>";
    }
}
?>
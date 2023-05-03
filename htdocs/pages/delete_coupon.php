<?php
if ($_GET['id_coupon']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "UPDATE coupon SET is_delete = 1, delete_time = NOW() WHERE id_coupon='" . $_GET['id_coupon'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Coupon deleted successfully.');location.href='../pages/coupon.php';</script>";
    } else {
        echo "<script>alert('Failed to delete coupon.');location.href='../pages/coupon.php';</script>";
    }
}
?>
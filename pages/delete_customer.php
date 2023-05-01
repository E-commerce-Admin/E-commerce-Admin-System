<?php
if ($_GET['id_customer']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "delete from customer where id_customer='" . $_GET['id_customer'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Successful delete customer');location.href='../pages/address.php';</script>";
    } else {
        echo "<script>alert('Failed to delete customer');location.href='../pages/address.php';</script>";
    }
}
?>
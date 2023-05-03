<?php
if ($_GET['id_product']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "UPDATE product SET is_delete = 1, delete_time = NOW() WHERE id_product='" . $_GET['id_product'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Product deleted successfully.');location.href='../pages/product.php';</script>";
    } else {
        echo "<script>alert('Failed to delete product.');location.href='../pages/product.php';</script>";
    }
}
?>
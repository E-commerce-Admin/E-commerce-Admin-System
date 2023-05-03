<?php
if ($_GET['id_category']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "UPDATE category SET is_delete = 1, delete_time = NOW() WHERE id_category='" . $_GET['id_category'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Category deleted successfully.');location.href='../pages/category.php';</script>";
    } else {
        echo "<script>alert('Failed to delete category.');location.href='../pages/category.php';</script>";
    }
}
?>
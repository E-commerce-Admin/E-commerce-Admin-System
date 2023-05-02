<?php
if ($_GET['id_user']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "UPDATE user SET is_delete = 1, delete_time = NOW() WHERE id_user='" . $_GET['id_user'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('User deleted successfully.');location.href='../pages/user.php';</script>";
    } else {
        echo "<script>alert('Failed to delete user.');location.href='../pages/user.php';</script>";
    }
}
?>
<?php
if ($_GET['id_admin']) {
    include "connect_db.php";
    $qry_hapus = mysqli_query($conn, "delete from admin where id_admin='" . $_GET['id_admin'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus admin');location.href='../pages/admin.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus admin');location.href='../pages/admin.php';</script>";
    }
}
?>
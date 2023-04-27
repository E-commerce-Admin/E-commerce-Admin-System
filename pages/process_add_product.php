<?php
if ($_POST) {
    $id_product = $_POST['id_product'];
    $nama_product = $_POST['nama_product'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    //upload foto
    $ekstensi = array('png', 'jpg', 'jpeg');
    $namafile = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
    $ukuran = $_FILES['file']['size'];

    if (empty($nama_product)) {
        echo "<script>alert('nama product tidak boleh kosong');location.href='../pages/product.php';</script>";
    } else {
        if (!in_array($tipe_file, $ekstensi)) {
            header("location:../file/ubah_product.php?alert=gagal_ektensi");
        } else {
            if ($ukuran < 1044070) {
                move_uploaded_file($tmp, 'assets/foto_product/' . $namafile);
                include "connect_db.php";
                $query = mysqli_query($conn, "INSERT INTO product (id_product, nama_product, deskripsi, harga, foto_product) VALUE ('" . $id_product . "', '" . $nama_product . "','" . $deskripsi . "', '" . $harga . "', '" . $namafile . "')");
                if ($query) {
                    echo "<script>alert('Sukses tambah product');location.href='../pages/product.php';</script>";
                } else {
                    echo "<script>alert('Gagal tambah product');location.href='../pages/product.php';</script>";
                }
            } else {
                echo "<script>alert('Ukuran Terlalu Besar');location.href='../pages/product.php';</script>";
            }
        }
    }
}
?>
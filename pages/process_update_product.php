<?php
if ($_POST) {
    $id_product = $_POST['id'];
    $nama_product = $_POST['name'];
    $deskripsi = $_POST['description'];
    $harga = $_POST['price'];
    //upload photo
    $ekstensi = array('png', 'jpg', 'jpeg');
    $namafile = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
    $ukuran = $_FILES['file']['size'];

    if (empty($nama_product)) {
        echo "<script>alert('nama product tidak boleh kosong');location.href='../pages/update_product.php';</script>";
    } else {
        if (!in_array($tipe_file, $ekstensi)) {
            header("location:../file/update_product.php?alert=gagal_ektensi");
        } else {
            if ($ukuran < 1044070) {
                move_uploaded_file($tmp, 'assets/product_photo/' . $namafile);
                include "connect_db.php";
                $update = mysqli_query($conn, "update product set nama_product='" . $nama_product . "',deskripsi='" . $deskripsi . "',
                    harga='" . $harga . "', product_photo='" . $namafile . "',id_product='" . $id_product . "' where id_product = '" . $id_product . "'") or die(mysqli_error($conn));
                if ($update) {
                    echo "<script>alert('Sukses update product');location.href='../pages/product.php';</script>";
                } else {
                    echo "<script>alert('Gagal update product');location.href='../pages/update_product.php';</script>";
                }
            } else {
                echo "<script>alert('Ukuran Terlalu Besar');location.href='../pages/update_product.php';</script>";
            }
        }
    }
}
?>
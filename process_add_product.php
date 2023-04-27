<?php
if ($_POST) {
    $id_product = $_POST['id_product'];
    $name_product = $_POST['name_product'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    //upload foto
    $ekstensi = array('png', 'jpg', 'jpeg');
    $namefile = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $tipe_file = pathinfo($namefile, PATHINFO_EXTENSION);
    $ukuran = $_FILES['file']['size'];

    if (empty($name_product)) {
        echo "<script>alert('nama product tidak boleh kosong');location.href='../pages/product.php';</script>";
    } else {
        if (!in_array($tipe_file, $ekstensi)) {
            header("location:../file/ubah_product.php?alert=gagal_ektensi");
        } else {
            if ($ukuran < 1044070) {
                move_uploaded_file($tmp, 'assets/product_photo/' . $namefile);
                include "connect_db.php";
                $query = mysqli_query($conn, "INSERT INTO product (id_product, name_product, description, price, product_photo) VALUE ('" . $id_product . "', '" . $name_product . "','" . $description . "', '" . $price . "', '" . $namefile . "')");
                if ($query) {
                    echo "<script>alert('Successfully add product');location.href='../pages/product.php';</script>";
                } else {
                    echo "<script>alert('Failed to add product');location.href='../pages/product.php';</script>";
                }
            } else {
                echo "<script>alert('Size Too Big');location.href='../pages/product.php';</script>";
            }
        }
    }
}
?>
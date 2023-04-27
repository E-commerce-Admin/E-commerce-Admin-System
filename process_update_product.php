<?php
if ($_POST) {
    $id_product = $_POST['id_product'];
    $name_product = $_POST['name_product'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    //upload photo
    $ekstensi = array('png', 'jpg', 'jpeg');
    $namefile = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $tipe_file = pathinfo($namefile, PATHINFO_EXTENSION);
    $ukuran = $_FILES['file']['size'];

    if (empty($name_product)) {
        echo "<script>alert('nama product tidak boleh kosong');location.href='../pages/update_product.php';</script>";
    } else {
        if (!in_array($tipe_file, $ekstensi)) {
            header("location:../file/update_product.php?alert=failed_extension");
        } else {
            if ($ukuran < 1044070) {
                move_uploaded_file($tmp, 'assets/product_photo/' . $namefile);
                include "connect_db.php";
                $update = mysqli_query($conn, "update product set name_product='" . $name_product . "',description='" . $description . "',
                price='" . $price . "', product_photo='" . $namefile . "',id_product='" . $id_product . "' where id_product = '" . $id_product . "'") or die(mysqli_error($conn));
                if ($update) {
                    echo "<script>alert('Successfully update product');location.href='../pages/product.php';</script>";
                } else {
                    echo "<script>alert('Failed to update product');location.href='../pages/update_product.php';</script>";
                }
            } else {
                echo "<script>alert('Size Too Big');location.href='../pages/update_product.php';</script>";
            }
        }
    }
}
?>
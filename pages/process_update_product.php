<?php
if ($_POST) {
    $id_product = $_POST['id_product'];
    $name_product = $_POST['name_product'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $category_value = $_POST['id_category'];
    $category_parts = explode("|", $category_value);
    $id_category = $category_parts[0];
    $category_name = $category_parts[1];


    // Check if the checkbox is checked
    if (isset($_POST['keep_photo'])) {
        $update_photo = "";
    } else {
        // Upload photo
        $image = array('png', 'jpg', 'jpeg');
        $namefile = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
        $tipe_file = pathinfo($namefile, PATHINFO_EXTENSION);
        $size = $_FILES['file']['size'];

        if (empty($name_product)) {
            echo "<script>alert('Product name cannot be empty');location.href='../pages/update_product.php?id_product=" . $id_product . "';</script>";
        } else {
            if (!in_array($tipe_file, $image)) {
                echo "<script>alert('Invalid file type. Only png, jpg, and jpeg are allowed.');location.href='../pages/update_product.php?id_product=" . $id_product . "';</script>";
            } else {
                if ($size < 1044070) {
                    move_uploaded_file($tmp, 'assets/product_photo/' . $namefile);
                    $update_photo = ", product_photo='" . $namefile . "'";
                } else {
                    echo "<script>alert('File size is too big. Maximum size is 1 MB.');location.href='../pages/update_product.php?id_product=" . $id_product . "';</script>";
                }
            }
        }
    }

    include "connect_db.php";
    $update = mysqli_query($conn, "UPDATE product SET name_product='" . $name_product . "', description='" . $description . "', price='" . $price . "', id_category='" . $id_category . "', category_name='" . $category_name . "', stock='" . $stock . "'" . $update_photo . " WHERE id_product='" . $id_product . "'") or die(mysqli_error($conn));

    if ($update) {
        echo "<script>alert('Product updated successfully.');location.href='../pages/product.php';</script>";
    } else {
        echo "<script>alert('Failed to update product.');location.href='../pages/update_product.php?id_product=" . $id_product . "';</script>";
    }
}
?>
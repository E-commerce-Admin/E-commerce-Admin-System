<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
}
?>

<?php
if ($_POST) {
    $name_product = $_POST['name_product'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $category_value = $_POST['id_category'];
    $category_parts = explode("|", $category_value);
    $id_category = $category_parts[0];
    $category_name = $category_parts[1];


    // Check if any required fields are empty
    $error_messages = array();
    
    if (empty($name_product)) {
        $error_messages[] = "Product name is required.";
    }
    if (empty($category_name)) {
        $error_messages[] = "Category name is required.";
    }
    if (empty($price)) {
        $error_messages[] = "Product price is required.";
    }
    if (empty($stock)) {
        $error_messages[] = "Product stock is required.";
    }
    if (empty($_FILES['file']['name'])) {
        $error_messages[] = "Product photo is required.";
    }

    if (!empty($error_messages)) {
        $error_message = implode("<br>", $error_messages);
        echo "<script>alert('Error: " . $error_message . "');location.href='../pages/product.php';</script>";
    } else {
        // Upload photo
        $image = array('png', 'jpg', 'jpeg');
        $namefile = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
        $tipe_file = pathinfo($namefile, PATHINFO_EXTENSION);
        $size = $_FILES['file']['size'];
        $id_creator = $_SESSION['id_user'];

        if (!in_array($tipe_file, $image)) {
            echo "<script>alert('Invalid file type. Only png, jpg, and jpeg are allowed.');location.href='../pages/product.php';</script>";
        } else {
            if ($size < 1044070) {
                move_uploaded_file($tmp, './assets/product_photo/' . $namefile);
                include "connect_db.php";
                $query = mysqli_query($conn, "INSERT INTO product (name_product, stock, create_time, id_creator, delete_time, description, category_name, product_photo, id_category, price) VALUES ('" . $name_product . "', '" . $stock . "', CURRENT_TIMESTAMP(), '" . $id_creator . "', NULL, '" . $description . "', '" . $category_name . "', '" . $namefile . "', '" . $id_category . "', '" . $price . "')");
                if ($query) {
                    echo "<script>alert('Product added successfully.');location.href='../pages/product.php';</script>";
                } else {
                    echo "<script>alert('Failed to add product.');location.href='../pages/product.php';</script>";
                }
            } else {
                echo "<script>alert('File size is too big. Maximum size is 1 MB.');location.href='../pages/product.php';</script>";
            }
        }
    }
}

?>
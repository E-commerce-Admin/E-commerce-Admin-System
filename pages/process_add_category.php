<?php
session_start();
if ($_SESSION['status_login'] != true) {
  header('location: login.php');
}
?>
<?php

if ($_POST) {
    $id_creator = $_SESSION['id_user'];
    $name_category = $_POST['name_category'];
    $description = $_POST['description'];

    // Upload photo
    $image = array('png', 'jpg', 'jpeg');
    $namefile = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $tipe_file = pathinfo($namefile, PATHINFO_EXTENSION);
    $size = $_FILES['file']['size'];

    // Validate form inputs
    if (empty($name_category)) {
        echo "<script>alert('Category name cannot be empty');location.href='../pages/category.php';</script>";
    } else {
        // Check if category ID already exists
        include "connect_db.php";
        $check_id = mysqli_query($conn, "SELECT * FROM category WHERE id_category='$id_category'");
        if (mysqli_num_rows($check_id) > 0) {
            echo "<script>alert('Category ID already exists. Please choose a different ID.');location.href='../pages/category.php';</script>";
        } else {
            if (!in_array($tipe_file, $image)) {
                echo "<script>alert('Invalid file type. Only png, jpg, and jpeg are allowed.');location.href='../pages/category.php';</script>";
            } else {
                if ($size < 1044070) {
                    move_uploaded_file($tmp, '../assets/category_photo/' . $namefile);
                    $category_photo = 'assets/category_photo/' . $namefile;
                } else {
                    echo "<script>alert('File size is too big. Maximum size is 1 MB.');location.href='../pages/category.php';</script>";
                }
            }
        }

        // Insert new category into database
        $insert = mysqli_query($conn, "INSERT INTO category (category_name, introduction, category_photo, id_creator, create_time) VALUES ('$name_category', '$description', '$category_photo', '$id_creator', now())") or die(mysqli_error($conn));

        if ($insert) {
            echo "<script>alert('Category added successfully.');location.href='../pages/category.php';</script>";
        } else {
            echo "<script>alert('Failed to add category.');location.href='../pages/category.php';</script>";
        }
    }
}

?>
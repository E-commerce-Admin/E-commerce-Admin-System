<?php
if ($_POST) {
    $id_category = $_POST['id_category'];
    $category_name = $_POST['category_name'];
    $introduction = $_POST['introduction'];

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

        if (empty($category_name)) {
            echo "<script>alert('Category name cannot be empty');location.href='../pages/update_category.php?id_category=" . $id_category . "';</script>";
        } else {
            if (!in_array($tipe_file, $image)) {
                echo "<script>alert('Invalid file type. Only png, jpg, and jpeg are allowed.');location.href='../pages/update_category.php?id_category=" . $id_category . "';</script>";
            } else {
                if ($size < 1044070) {
                    move_uploaded_file($tmp, 'assets/category_photo/' . $namefile);
                    $update_photo = ", category_photo='" . $namefile . "'";
                } else {
                    echo "<script>alert('File size is too big. Maximum size is 1 MB.');location.href='../pages/update_category.php?id_category=" . $id_category . "';</script>";
                }
            }
        }
    }

    include "connect_db.php";
    $update = mysqli_query($conn, "UPDATE category SET category_name='$category_name', introduction='$introduction'" . $update_photo . " WHERE id_category='$id_category'") or die(mysqli_error($conn));

    if ($update) {
        echo "<script>alert('Category updated successfully.');location.href='../pages/category.php';</script>";
    } else {
        echo "<script>alert('Failed to update category.');location.href='../pages/update_category.php?id_category=" . $id_category . "';</script>";
    }
}
?>
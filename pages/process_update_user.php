<?php
if ($_POST) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $phone_number = $_POST['phone_number'];
    $authority = $_POST['authority'];

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

        if (empty($username)) {
            echo "<script>alert('Username cannot be empty');location.href='../pages/update_user.php?id_user=" . $id_user . "';</script>";
        } else {
            if (!in_array($tipe_file, $image)) {
                echo "<script>alert('Invalid file type. Only png, jpg, and jpeg are allowed.');location.href='../pages/update_user.php?id_user=" . $id_user . "';</script>";
            } else {
                if ($size < 1044070) {
                    move_uploaded_file($tmp, 'assets/img/' . $namefile);
                    $update_photo = ", user_photo='" . $namefile . "'";
                } else {
                    echo "<script>alert('File size is too big. Maximum size is 1 MB.');location.href='../pages/update_user.php?id_user=" . $id_user . "';</script>";
                }
            }
        }
    }

    include "connect_db.php";
    $update = mysqli_query($conn, "UPDATE user SET username='$username', password='$password', mail='$mail', phone_number='$phone_number', authority='$authority'" . $update_photo . " WHERE id_user='$id_user'") or die(mysqli_error($conn));

    if ($update) {
        echo "<script>alert('User updated successfully.');location.href='../pages/user.php';</script>";
    } else {
        echo "<script>alert('Failed to update user.');location.href='../pages/update_user.php?id_user=" . $id_user . "';</script>";
    }
}
?>
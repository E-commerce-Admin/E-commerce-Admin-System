<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
}
?>
<?php
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $phone_number = $_POST['phone_number'];

    if (empty($username)) {
        echo "<script>alert('Username must not be empty');location.href='../pages/user.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password must not be empty');location.href='../pages/user.php';</script>";
    } else {
        // Check if user already exists
        include "connect_db.php";
        $check_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user='" . $id_user . "' OR username='" . $username . "'");
        if (mysqli_num_rows($check_user) > 0) {
            echo "<script>alert('User with the same ID or username already exists');location.href='../pages/user.php';</script>";
        } else {
            // Upload photo
            $image = array('png', 'jpg', 'jpeg');
            $namefile = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            $tipe_file = pathinfo($namefile, PATHINFO_EXTENSION);
            $size = $_FILES['file']['size'];

            if (!in_array($tipe_file, $image)) {
                echo "<script>alert('Invalid file type. Only png, jpg, and jpeg are allowed.');location.href='../pages/user.php';</script>";
            } else {
                if ($size < 1044070) {
                    move_uploaded_file($tmp, '../assets/img/' . $namefile);
                    $user_photo = $namefile;
                } else {
                    echo "<script>alert('File size is too big. Maximum size is 1 MB.');location.href='../pages/user.php';</script>";
                }
            }

            // Insert user data into the database
            $authority = $_POST['authority'];
            // Insert user data into the database
            $id_creator = (int) $_SESSION['id_user'];
            $insert = mysqli_query($conn, "INSERT INTO user (username, mail, phone_number, authority, user_photo, password, create_time, id_creator) VALUES ('$username', '$mail', '$phone_number', '$authority', '$user_photo', '$password', CURRENT_TIMESTAMP(), $id_creator)") or die(mysqli_error($conn));

            if ($insert) {
                echo "<script>alert('User added successfully.');location.href='../pages/user.php';</script>";
            } else {
                echo "<script>alert('Failed to add user.');location.href='../pages/user.php';</script>";
            }
        }
    }
}
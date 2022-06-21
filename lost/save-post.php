<?php
require_once "../config/config.php";

if (isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $error = array();
// check extension

    $tmp = explode(".", $file_name);
    $file_exe = end($tmp);
    $extension = array("jpg", "jpeg", "png");
    if (in_array($file_exe, $extension) === false) {
        $error[] = "This Extension file not allow please input jpeg, jpg,png file";
    }
    if ($file_size > 2097152) {
        $error[] = "File size must be 2md or lower";
    }
    $new_name = time() . "_" . basename($file_name);
    $target = "../upload/img/" . $new_name;
    if (empty($error) == true) {
        move_uploaded_file($file_tmp, $target);
    } else {
        echo "please input jpeg, jpg, png file and file size maximum 2 mb";
        die();
    }
}

$objname = mysqli_real_escape_string($conn, $_POST['objname']);
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$description = mysqli_real_escape_string($conn, $_POST['desc']);
$landmark = mysqli_real_escape_string($conn, $_POST['land']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$date = date("d M,Y");

$sql = "INSERT INTO lostproduct(objectname,description,postdate,postimg,lcountry,lcity,landmark,Number,author)
VALUES('{$objname}','{$description}','{$date}','{$new_name}','{$country}','{$city}','{$landmark}','{$number}','{$user_id}')";

if (mysqli_query($conn, $sql)) {
    header("location:lost.php");
} else {
    echo "<div class='alert alert-danger'>Query Failed.</div>";
}
<?php

require_once "../config/config.php";

if (isset($_FILES['uploadfile'])) {
    $file_name = $_FILES['uploadfile']['name'];
    $file_size = $_FILES['uploadfile']['size'];
    $file_tmp = $_FILES['uploadfile']['tmp_name'];
    $file_type = $_FILES['uploadfile']['type'];
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
$objectname = mysqli_real_escape_string($conn, $_POST['objname']);
$number = mysqli_real_escape_string($conn, $_POST['mnumber']);
$description = mysqli_real_escape_string($conn, $_POST['desc']);
$flnad = mysqli_real_escape_string($conn, $_POST['flandmark']);
$fcountry = mysqli_real_escape_string($conn, $_POST['fcountry']);
$fcity = mysqli_real_escape_string($conn, $_POST['fcity']);
$rcity = mysqli_real_escape_string($conn, $_POST['rcity']);
$date = date("d M,Y");
$user_id = mysqli_real_escape_string($conn, $_POST['userid']);
$landmark = mysqli_real_escape_string($conn, $_POST['rlandmark']);
$sql = "INSERT INTO foundproduct(objectname,description,postdate,postimg,author,number,fland,fountry,fcity,rcity,rland)
 VALUES('{$objectname}','{$description}','{$date}','{$new_name}','{$user_id}','{$number}','{$flnad}','{$fcountry}','{$fcity}','{$rcity}','{$landmark}')";
if (mysqli_query($conn, $sql)) {
    header("location:found.php");
} else {
    echo ("Error description: " . mysqli_error($conn));
}
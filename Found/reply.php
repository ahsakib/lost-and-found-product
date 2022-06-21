<?php
session_start();
require_once "../config/config.php";
$reply = mysqli_real_escape_string($conn, $_GET['user_reply']);
$commentid = mysqli_real_escape_string($conn, $_GET['parent_id']);
$user_id = mysqli_real_escape_string($conn, $_SESSION['userid']);
date_default_timezone_set("Asia/Dhaka");
$current_time = time();
$dateTime = strftime("%d-%B-%Y %H-%M-%S", $current_time);
$post_id = mysqli_real_escape_string($conn, $_GET['post_id']);

$sql = "INSERT INTO commentreply(userreply,user_id,datetime,comentid) VALUES('{$reply}','{$user_id}','{$dateTime}','{$commentid}')";
var_dump($sql);
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
    header("location:readmore.php?id=$post_id");
} else {
    echo "query failed";
}
<?php
session_start();
require_once "../config/config.php";
require_once "../inc/session.php";

$admin = $_SESSION['username'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE comment SET status='ON', approvedby='{$admin}' WHERE id={$id}";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['successmessage'] = "Comment Approved Successfully !";
        header("location:comment.php");
    } else {
        $_SESSION['errorMessage'] = "Someting Went Wrong";
        header("location:comment.php");
    }
}
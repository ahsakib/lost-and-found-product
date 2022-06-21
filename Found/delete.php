<?php
session_start();
require_once "../config/config.php";
require_once "../inc/session.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM comment WHERE id={$id}";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['successmessage'] = "Delete comment successfully";
        header("location:comment.php");
    } else {
        $_SESSION['errorMessage'] = "Somethin Went Wrong";
        header("location:comment.php");

    }

}
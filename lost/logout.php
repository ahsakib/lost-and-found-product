<?php
require_once "../config/config.php";
session_start();
session_unset();
session_destroy();

$page = $_GET['page'];
if ($page == "foundpage") {
    header("location:../Found/found.php");
} else {
    header("location:lost.php");
}
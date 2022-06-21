<?php
require_once "../config/config.php";

?>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">HOME</a>
            <a class="navbar-brand" href="found.php">FOUND PRODUCT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0 d-flex" style="width: 98%;" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                        name="search" style="margin-right: 10px;">
                    <button class="btn bg-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>


            <?php
session_start();
if (isset($_SESSION["username"])) {
    echo " <a class='navbar-brand' href='add.php'>ADD PRODUCT</a>";
} else {
    echo "<a class='navbar-brand' href='../lost/login.php?type=found'>ADD PRODUCT</a>";
}

?>

            <a class="navbar-brand" href="../lost/logout.php?page=foundpage">LOG OUT</a>

        </div>
    </nav>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../inc/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Found</title>
</head>
<style>
.page-link {

    background-color: #0d6efd !important;
    color: #fff;
}

.page-link:hover {
    background-color: #333 !important;
    color: #fff;
}

.pagination .active {
    background-color: #333 !important;
    color: #fff !important;
}

.page-link:focus {
    box-shadow: none;
}

.btn-check:focus+.btn-outline-light,
.btn-outline-light:focus {
    box-shadow: none;
}

#bgshadow {

    background-color: #fff;
    padding: 25px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
}
</style>

<body>
    <?php include 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h5>THIS IS THE LIST OF THE ITEMS THAT ARE LOST BY SOME OTHER PERSON, GO AND CONTACT THE PERSON IF YOU
                    FOUND IT.HOPE YOU WILL FIND YOUR ITEMS OWNER </h5>
            </div>

            <div class="container">
                <div class="row mt-3">
                    <div class="col-md-8">
                        <!-- post-container -->
                        <div class="post-container" id="bgshadow">
                            <?php
$limit = 4;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
require_once "../config/config.php";
$sql = "SELECT * FROM foundproduct JOIN user ON foundproduct.author=user.user_id ORDER BY fproductid DESC LIMIT {$offset},{$limit}";
$result = mysqli_query($conn, $sql);
if (isset($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
                            <div class="post-content">
                                <div class="row mb-4 py-4 shadow">
                                    <div class="col-md-4">
                                        <a class="post-img" href="readmore.php?id=<?php echo $row['fproductid'] ?>"><img
                                                class="" style="width: 250px; height: 200px; object-fit: cover;"
                                                src="../upload/img/<?php echo $row['postimg'] ?>" alt="" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3><a
                                                    href="readmore.php?id=<?php echo $row['fproductid'] ?>"><?php echo $row['objectname'] ?></a>
                                            </h3>
                                            <div class="post-information">
                                                <span>
                                                    <i style="color: #1e90ff;" class="fas fa-user"></i>
                                                    <a href='author.php?aid=<?php echo $row['author'] ?>'
                                                        style="color: #666;"><?php echo $row['username'] ?></a>
                                                </span>
                                                <span style="color: #666;">
                                                    <i style="color: #1e90ff;" class="fas fa-calendar-alt"></i>
                                                    <?php echo $row['postdate'] ?>
                                                </span>
                                            </div>
                                            <p class="description" style="color: #666;">
                                                <?php echo $row['description'] ?>
                                            </p>
                                            <button class="btn btn-primary"><a class='' style="color: #fff;"
                                                    href="readmore.php?id=<?php echo $row['fproductid'] ?>">READ
                                                    MORE</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
}
}
?>


                            <div class="my-4">
                                <nav aria-label="Page navigation example">

                                    <?php
$sql2 = "SELECT * FROM foundproduct";
$result2 = mysqli_query($conn, $sql2);
if (isset($result2) > 0) {

    $total_records = mysqli_num_rows($result2);
    $total_page = ceil($total_records / $limit);

    echo ' <ul class="pagination justify-content-center">';
    if ($page > 1) {
        echo '<li class="page-item"> <a class="page-link" href="found.php?page=' . ($page - 1) . '">Previous</a></li>';
    }
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo "<li class='page-item'><a class='page-link {$active}' href='found.php?page={$i}'>{$i}</a></li>";
    }
    if ($page < $total_page) {
        echo '<li class="page-item"> <a class="page-link" href="found.php?page=' . ($page + 1) . '">NEXT</a></li>';

    }
    echo '</ul>';
}

?>
                                    <!-- <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul> -->
                                </nav>
                            </div>
                        </div>

                    </div><!-- /post-container -->
                    <?php include 'sidebar.php'?>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>
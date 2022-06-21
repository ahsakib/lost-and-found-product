<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read More</title>
    <link rel="stylesheet" href="../inc/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<style>
#bgshadow {

    background-color: #fff;
    padding: 25px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
}
</style>

<body>
    <?php include 'header.php';
require_once "../config/config.php";
?>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-8">
                <?php
$productid = $_GET['id'];
$sql = "SELECT * FROM lostproduct JOIN user ON lostproduct.author=user.user_id WHERE lostproduct.lproductid={$productid}";
$result = mysqli_query($conn, $sql);
if (isset($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <div class="row" id="bgshadow">
                    <div class="col-md-12">

                        <h3><?php echo strtoupper($row['objectname']) ?></h3>

                    </div>
                    <div class="col-md-12">
                        <span>
                            <i style="color: #1e90ff;" class="fas fa-user"></i>
                            <a href='author.php?id=<?php echo $row['author'] ?>'
                                style="color: #666;"><?php echo $row['username'] ?></a>
                        </span>
                        <span style="color: #666;">
                            <i style="color: #1e90ff;" class="fas fa-calendar-alt"></i>
                            <?php echo $row['postdate'] ?>
                        </span>
                        <span style="color: #666;">
                            <i style="color: #1e90ff;" class="fas fa-phone-alt"></i>
                            <?php echo $row['Number'] ?>
                        </span>
                    </div>
                    <div class="col-md-12 text-center my-5">
                        <img class="" style="width: 650px;object-fit: cover;"
                            src="../upload/img/<?php echo $row['postimg'] ?>" alt="" srcset="">
                    </div>
                    <div class="col-md-12">
                        <p>
                            <?php echo $row['description'] ?>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <form>
                            <div class="form-group">
                                <h3>WHERE PRODUCT LOST</h3>
                                <label for="exampleInputEmail1">Landmark</label>
                                <input readonly type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['landmark'] ?>">
                                <label for="exampleInputEmail1">country</label>
                                <input readonly type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['lcountry'] ?>">
                                <label for="exampleInputEmail1">City</label>
                                <input readonly type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php $row['lcity']?>">

                            </div>
                        </form>
                    </div>
                </div>
                <?php
}
}
?>
            </div>
            <?php include 'sidebar.php'?>
        </div>

    </div>
</body>

</html>
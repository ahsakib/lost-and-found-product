<?php
require_once "../config/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Product</title>
    <link rel="stylesheet" href="../inc/bootstrap.min.css">
    <script src="../inc/bootstrap.min.js"></script>
    <script src="../inc/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="navbar-brand" href="../index.php">HOME</a>
                <a class="navbar-brand" href="found.php">FOUND PRODUCT</a>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row">

            <div class="col-md-12 my-3">
                <?php
session_start();
$sql = 'SELECT user_id FROM user WHERE username="' . $_SESSION['username'] . '"';
$result = mysqli_query($conn, $sql);
if (isset($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <form action="save_post.php" method="POST" enctype="multipart/form-data">
                    <div class="shadow p-4 mb-5">
                        <div class="text-center">
                            <h3>What You Found ?</h3>
                        </div>
                        <div class="form-group my-3">
                            <label for="objectname">Object Name</label>
                            <input type="text" class="form-control" name="objname" id="objectname"
                                aria-describedby="objectname" placeholder="Object Name">
                            <input type="hidden" class="form-control" name="userid"
                                value="<?php echo $row['user_id'] ?>">
                        </div>
                        <div class="form-group my-3">
                            <label for="mobile">Mobile Number</label>
                            <input type="number" name="mnumber" class="form-control" id="mobile"
                                aria-describedby="mobile" placeholder="Mobile Number">
                        </div>
                        <div class="form-group my-3">
                            <label for="exampleFormControlTextarea1">Object Description</label>
                            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>

                    </div>
                    <div class="shadow p-4 mb-5">
                        <div class="text-center">
                            <h3>Where You Found ?</h3>
                        </div>
                        <div class="form-group my-3">
                            <label for="objectmlandmark">Landmark</label>
                            <input type="text" class="form-control" name="flandmark" id="objectmlandmark"
                                aria-describedby="objectname" placeholder="Landmark">
                        </div>
                        <div class="form-group my-3">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="fcountry" id="country"
                                aria-describedby="objectname" placeholder="Country">
                        </div>
                        <div class="form-group my-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="fcity" id="city" aria-describedby="objectname"
                                placeholder="City">
                        </div>

                    </div>
                    <div class="shadow p-4 mb-5">
                        <div class="text-center">
                            <h3>Where You can return ?</h3>
                        </div>
                        <div class="form-group my-3">
                            <label for="landmark">Landmark</label>
                            <input type="text" class="form-control" name="rlandmark" id="landmark"
                                placeholder="Landmark">
                        </div>
                        <div class="form-group my-3">
                            <label for="cityd">City</label>
                            <input type="text" class="form-control" name="rcity" id="cityd"
                                aria-describedby="objectname" placeholder="City">
                        </div>

                    </div>
                    <div class="shadow p-4 mb-3">
                        <div class="text-center">
                            <h3>Input your product image</h3>
                        </div>
                        <div class="form-group text-center my-3">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input type="file" name="uploadfile" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

                <?php
}
}
?>
            </div>
        </div>
    </div>
</body>

</html>
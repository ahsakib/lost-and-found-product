<?php
require_once "../config/config.php";
require_once "../inc/session.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menage Comment</title>
    <link rel="stylesheet" href="../inc/bootstrap.min.css">
    <script src="../inc/bootstrap.min.js"></script>
    <script src="../inc/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<style>
.fa-comments {
    color: #fff;
    font-size: 50px;
}

.mcomment {
    color: #fff;
    font-size: 50px;
    display: inline-block;
    padding-left: 15px;
}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-4 bg-dark">
                <i class="fas fa-comments"></i>
                <p class="mcomment">Manage Comment</p>
            </div>
            <?php

echo errorMessage();
echo successmessage();

?>
            <div class=" col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Approve</th>
                            <th scope="col">Action</th>
                            <th scope="col">Details</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
$srNo = 1;

$sql = "SELECT * FROM comment WHERE status='OFF' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (isset($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
                        <tr>
                            <th scope="row"><?php echo htmlentities($srNo++); ?></th>
                            <td><?php echo htmlentities($row['name']) ?></td>
                            <td><?php echo htmlentities($row['datetime']) ?></td>
                            <td><?php echo htmlentities($row['comment']) ?></td>
                            <td><a href="approve.php?id=<?php echo $row['id'] ?>"><button
                                        class="btn btn-success">Approve</button></a></td>
                            <td><a href="delete.php?id=<?php echo $row['id'] ?>"><button
                                        class="btn btn-danger">DELETE</button></a></td>
                            <td><a href="readmore.php?id=<?php echo $row['post_id'] ?>"><button
                                        class="btn btn-primary">Live Preview</button></a></td>
                        </tr>
                        <?php }
}
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
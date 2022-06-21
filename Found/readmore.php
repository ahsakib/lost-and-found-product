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

.Filedinfo {
    color: #f39c12;
}

.input-group-text {
    padding: 10px;
}

.reply-textarea {
    border: 0;
    border-bottom: 1px solid black;
    border-radius: 0;
}

.reply-textarea:focus {
    outline: 0 !important;
    box-shadow: none;
}

.fa-angle-down {
    padding-right: 10px;
}

.fa-angle-up {
    padding-right: 10px;

}
</style>

<body>
    <?php include 'header.php'?>
    <?php
require_once "../config/config.php";
require_once "../inc/session.php";
?>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-8">
                <?php

$id = $_GET['id'];
$sql = "SELECT * FROM foundproduct JOIN user ON foundproduct.author=user.user_id WHERE fproductid={$id}";
$result = mysqli_query($conn, $sql);

if (isset($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <div class="row" id="bgshadow">
                    <div class="col-md-12">

                        <h3><?php echo $row['description'] ?></h3>

                    </div>
                    <div class="col-md-12">
                        <span>
                            <i style="color: #1e90ff;" class="fas fa-user"></i>
                            <a href='author.php?aid=<?php echo $row['author'] ?>'
                                style="color: #666;"><?php echo $row['username'] ?></a>
                        </span>
                        <span style="color: #666;">
                            <i style="color: #1e90ff;" class="fas fa-calendar-alt"></i>
                            <?php echo $row['postdate'] ?>
                        </span>
                        <span style="color: #666;">
                            <i style="color: #1e90ff;" class="fas fa-phone-alt"></i>
                            <?php echo $row['number'] ?>
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
                            <div class="form-group mb-4">
                                <h3 class="text-center">WHERE IT FOUND</h3>
                                <label for="exampleInputEmail1">Landmark</label>
                                <input readonly type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['fland'] ?>">
                                <label for="exampleInputEmail1">country</label>
                                <input readonly type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['fountry'] ?>">
                                <label for="exampleInputEmail1">City</label>
                                <input readonly type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['fcity'] ?>">

                            </div>
                            <div class="form-group">
                                <h3 class="text-center">WHERE YOU CAN RETURN</h3>
                                <label for="exampleInputEmail1">Landmark</label>
                                <input readonly type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['rland'] ?>">

                                <label for="exampleInputEmail1">City</label>
                                <input readonly type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['rcity'] ?>">

                            </div>

                        </form>
                    </div>
                </div>
                <?php
}
}
?>
                <!-- comment fetching start -->
                <section style="background-color: #e7effd;">
                    <div class="container my-5 text-dark">
                        <div class="row d-flex justify-content-center">

                            <?php
$sql3 = "SELECT * FROM comment WHERE comment.post_id={$id} AND comment.status='ON'";

$result3 = mysqli_query($conn, $sql3);

if (isset($result3) > 0) {
    while ($row3 = mysqli_fetch_assoc($result3)) {

        ?>
                            <div class="col-md-12 my-5">
                                <div class="d-flex flex-start mb-4">
                                    <img class="rounded-circle shadow-1-strong me-3" src="../upload/img/user.png"
                                        alt="avatar" width="65" height="65" />
                                    <div class="card w-100">
                                        <div class="card-body p-4">
                                            <div class="">
                                                <h5><?php echo $row3['name'] ?></h5>

                                                <p class="small"><?php echo $row3['datetime'] ?></p>
                                                <p>
                                                    <?php echo $row3['comment'] ?>
                                                </p>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <a href="#!" class="link-muted me-2"><i
                                                                class="fas fa-thumbs-up me-1"></i>132</a>
                                                        <a href="#!" class="link-muted"><i
                                                                class="fas fa-thumbs-down me-1"></i>15</a>
                                                    </div>
                                                    <button class="reply-button btn btn-primary"><i
                                                            class="fas fa-reply me-1"></i>
                                                        Reply</button>
                                                </div>
                                                <div class="reply-box" style="display: none;">
                                                    <div style="padding-left: 55px;">
                                                        <p class="" style="font-weight: 600; margin-bottom: 0px;">Goru
                                                            Ahad</p>
                                                    </div>
                                                    <form action="reply.php" method="GET">
                                                        <div class="form-group"
                                                            style="padding-left: 55px;margin-bottom: 20px;">
                                                            <label for="exampleFormControlTextarea1">Reply</label>
                                                            <input type="hidden" name="parent_id"
                                                                value="<?php echo $row3['id'] ?>">
                                                            <input type="hidden" name="post_id"
                                                                value="<?php echo $row3['post_id'] ?>">
                                                            <textarea class="form-control reply-textarea"
                                                                name="user_reply" id="exampleFormControlTextarea1"
                                                                rows="1"></textarea>
                                                        </div>
                                                        <div style="text-align: end; margin-bottom: 10px;">
                                                            <button class="btn btn-primary" type="submit">REPLY</button>

                                                        </div>
                                                    </form>
                                                </div>

                                                <div>
                                                    <button class="viewreply-btn">
                                                        <i class="fas fa-angle-down"></i>
                                                        View reply
                                                    </button>
                                                    <?php
$parent_id = $row3['id'];

        $sql4 = "SELECT * FROM commentreply JOIN user ON commentreply.user_id=user.user_id WHERE comentid=$parent_id";
        $result4 = mysqli_query($conn, $sql4);
        if (isset($result4) > 0) {
            while ($row4 = mysqli_fetch_assoc($result4)) {

                ?>
                                                    <div class="view-reply-box" style="display:none;">
                                                        <h5><?php echo $row4['username'] ?></h5>
                                                        <small><?php echo $row4['datetime'] ?></small>
                                                        <p><?php echo $row4['userreply'] ?></p>
                                                    </div>
                                                    <?php

            }
        }
        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
}
?>
                        </div>
                    </div>
                </section>
                <!-- comment fetching end -->
                <!-- comment section start -->
                <?php

if (isset($_POST['submit'])) {
    $commentname = mysqli_real_escape_string($conn, $_POST['commentname']);
    $commentemail = mysqli_real_escape_string($conn, $_POST['commentemail']);
    $comment = mysqli_real_escape_string($conn, $_POST['commentthought']);
    date_default_timezone_set("Asia/Dhaka");
    $currentTime = time();
    $dateTime = strftime("%d-%B-%Y %H-%M-%S", $currentTime);

    if (empty($commentname) || empty($commentemail) || empty($comment)) {
        // $_SESSION["errormessage"] = "All Field Must Be Field Out";
        $_SESSION['errorMessage'] = "All filed must be field out";
    } else if (strlen($comment) > 500) {
        $_SESSION['errorMessage'] = "comment length should be less than 500 characters";
    } else {
        $sql2 = "INSERT INTO comment(name,email,comment,datetime,approvedby,status,post_id) VALUES('{$commentname}','{$commentemail}','{$comment}','{$dateTime}','pending','OFF','{$id}')";
        $result2 = mysqli_multi_query($conn, $sql2);

        if (isset($result2)) {
            $_SESSION['successmessage'] = "Comment submitted successfully !";
        }
    }
}

?>
                <div class="row my-2 shadow">
                    <div class="col-md-12 px-0">
                        <?php
echo errorMessage();
echo successmessage();
?>
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="Filedinfo">Share your thoughts about this post</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                                name="commentname">

                                        </div>
                                        <label for="exampleInputEmail1">Email address</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                name="commentemail" aria-describedby="emailHelp"
                                                placeholder="Enter email">

                                        </div>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your
                                            email
                                            with
                                            anyone else.</small>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleFormControlTextarea1">Comment</label>
                                        <textarea class="form-control" name="commentthought"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- comment section end -->
            </div>
            <?php include 'sidebar.php'?>
        </div>

    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".reply-btn").click(function() {
            $(this).parent().siblings(".reply-box").slideToggle();
        });
    });
    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

        $(".reply-button").click(function() {
            $(this).parent().siblings(".reply-box").slideToggle();
        })

        $(".viewreply-btn").click(function() {
            $(this).siblings(".view-reply-box").slideToggle();

            const viewreplytext = $(this).text();

            if (viewreplytext == "Hide reply") {
                // alert("inside if");
                $(this).text("View reply");
                $(this).prepend("<i class='fas fa-angle-down'></i>");

            } else {
                // alert("inside else");
                $(this).text("Hide reply");
                $(this).prepend("<i class='fas fa-angle-up'></i>");
            }

        })
    });
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../inc/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="row my-5 shadow justify-content-center">
            <div class="col-md-6 py-5">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="username" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>



                    <!-- Submit button -->
                    <button style="width: 100%;" type="submit" name="signin" class="btn btn-primary btn-block mb-4">Sign
                        in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="signup.php">Register</a></p>
                        <p>or sign up with:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>
                </form>

                <?php
if (isset($_GET["type"])) {
    $type = $_GET["type"];
}

if (isset($_POST['signin'])) {

    require_once "../config/config.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM user WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();

            $_SESSION['username'] = $row['username'];
            $_SESSION['pass'] = $row['password'];
            $_SESSION['userid'] = $row['user_id'];
            if ($type == 'found') {
                header("location: ../found/add.php");
            } else {
                header("location: ../lost/add.php");
            }
        }
    } else {
        echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
    }
}
?>
            </div>
        </div>
    </div>
</body>

</html>
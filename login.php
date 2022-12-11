<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        $_SESSION["login"] = true;
        $_SESSION["user"] = $username;
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | RPL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/loginstyle.css">
</head>

<body>
    <form action="" method="post">
        <div class="container rounded-4">
            <div class="row mb-3">
                <div class="col text-center">
                    <h1>Login</h1>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Username / Password yang anda masukkan salah.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="username">Username :</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" id="username" name="username">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="password">Password :</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="password" name="password">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col text-center">
                    <button type="submit" class="rounded-3" name="login" id="loginbtn">
                        Login
                    </button>
                </div>
            </div>
            <div class="row ">
                <div class="col text-center">
                    <p>Tidak ada akun ?. <a href="register.php" class="text-decoration-none">Register</a></p>
                </div>
            </div>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
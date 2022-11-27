<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if (register($_POST) > 0) {
        echo '<div class="alert alert-success" role="alert">
        Registrasi Berhasil !. Kembali ke<a href="login.php" class="alert-link text-decoration-none"> Login</a>.
      </div>';
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | RPL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/registerstyle.css">
</head>

<body>
    <form action="" method="post">
        <div class="container rounded-4">
            <div class="row mb-3">
                <div class="col text-center">
                    <h1>Register</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="username">Username :</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" id="username" name="username" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="password">Password :</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" id="password" name="password" required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="password2">Ulangi Password :</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Ulangi Password" aria-label="Username" aria-describedby="basic-addon1" id="password2" name="password2" required>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col text-center">
                    <button type="submit" class="rounded-3" name="register">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
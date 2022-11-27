<?php
require 'functions.php';
$murid = query("SELECT * FROM datamurid");

if (isset($_POST["search"])) {
    $murid = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="style.css">

<body class="">
    <div class="container rounded-4 bg-opacity-50">
        <h2 class="judul text-center mt-3">Murid X RPL-1</h2>
        <p class="subjudul text-center mb-3">Penasaran, siapa aja sih murid yang ada di kelas ini ?</p>
    </div>
    <br>
    <div class="container rounded-4">
        <form action="" method="post">
            <div class="input-group">
                <input type="text" class="form-control rounded-4" placeholder="Cari murid..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" autofocus autocomplete="off">
                <button class="btn btn-cari subjudul rounded-4" type="submit" name="search">Cari</button>
            </div>
        </form>
    </div>
    <br>
    <div class="container rounded-4">
        <?php foreach ($murid as $mrd) : ?>
            <div class="murid row text-center">
                <div class="col">
                    <h5><?= $mrd["nama"] ?></h5>
                    <p>No Absen : <?= $mrd["absen"] ?></p>
                    <p>Hobi : <?= $mrd["hobi"] ?></p>
                    <p>Motto : <?= $mrd["motto"] ?></p>
                    <p>Social Media : <a href=""><?= $mrd["sosmed"] ?></a></p>
                    <hr>
                </div>
            </div>
        <?php endforeach; ?>
    </div>





















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
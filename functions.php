<?php
$conn = mysqli_connect("localhost", "root", "", "webkelas");

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($key)
{
    $query = "SELECT * FROM datamurid WHERE
    nama LIKE '%$key%' OR
    absen LIKE '%$key%' OR
    motto LIKE '%$key%' OR
    sosmed LIKE '%$key%' OR
    hobi LIKE '%KEY%'";

    return query($query);
}

function register($data)
{
    global $conn;


    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo '<script>
                alert("Username sudah terpakai.")</script>';
        return false;
    }

    // cek konfirmasi
    if ($password !== $password2) {
        echo '<script>
                alert("Ulangi password dengan benar.")</script>';
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

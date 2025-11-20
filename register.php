<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($con, "SELECT * FROM user WHERE email='email'");
    if (mysqli_num_rows($check) > 0) {
        echo "email sudah terdaftar";    
    } else {
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username, '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "Berhasil daftar!";
        } else {
            echo "Gagal Daftar!";
        }
    }
} else {
        echo "Invalid request";
}
?>

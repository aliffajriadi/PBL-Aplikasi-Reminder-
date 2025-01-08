<?php
include '../koneksi.php';

if (isset($_POST['register'])) {
    // mengambil data dari variabel post
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $is_guru = $_POST['tipe_akun'] === 'teacher' ? 1 : 0;
    $foto_default = '../../asset/uploads/profiles/default_foto.jpg';

    // syarat apakah usename tersebut sudah digunakan
    $syarat1 = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($syarat1) > 0) {
        echo "<script>alert('Username sudah digunakan!');
        window.location='../../daftar';</script>";
        exit;
    }

    // syarat apakah email tersebut sudah digunakan
    $syarat2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($syarat2) > 0) {
        echo "<script>alert('email sudah digunakan!');
        window.location='../../daftar';</script>";
        exit;
    }

    // syarat apakah no telp tersebut sudah digunakan
    $syarat3 = mysqli_query($conn, "SELECT * FROM users WHERE telp = '$telp'");

    if (mysqli_num_rows($syarat3) > 0) {
        echo "<script>alert('No Telp. sudah digunakan!');
        window.location='../../daftar';</script>";
        exit;
    }

    // melakukan hashing pada password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // menyusun query untuk dieksekusi
    $query = "INSERT INTO users (username, password, email, is_guru, telp, foto_profil) VALUES ('$username', '$hashed_password', '$email', '$is_guru', '$telp', '$foto_default' )";

    // mengeksekusi query dan mengeceka apakah berhasil atau tidak
    if (mysqli_query($conn, $query)) {

        // jika berhasil maka akan muncul pop up berhasil
        echo "<script>alert('Berhasil melakukan registrasi akun!');
        window.location='../../login';</script>";
        // lalu diarahkan ke halaman login
    } else {

        // jika gagal maka akan muncul pop up gagal
        echo "<script>alert('Gagal melakukan registrasi akun: " . mysqli_error($conn) . "');
        window.location='../../daftar';</script>";
        // lalu diarahkan ke halaman daftar kembali 
    }
}

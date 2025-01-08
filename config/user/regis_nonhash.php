<?php
include '../koneksi.php';

if (isset($_POST['register'])) {
    // mengambil variabel post
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $is_guru = $_POST['tipe_akun'] === "teacher" ? 1 : 0;

    $syarat1 = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($syarat1) > 0){
        echo "<script>alert('Username sudah digunakan!');
        window.location='../../daftar';</script>";
    }

    $syarat2 = mysqli_query($conn, "SELECT * FROM users WHERE username = '$email'");

    if(mysqli_num_rows($syarat2) > 0){
        echo "<script>alert('Username sudah digunakan!');
        window.location='../../daftar';</script>";
    }

    echo mysqli_num_rows($syarat1);
    echo mysqli_num_rows($syarat1);

    
    // menyiapkan query
    $sql = "INSERT INTO users (username, password, email, is_guru) VALUES ('$username','$password', '$email','$is_guru')";

    // mengeksekusi query dan mengecek apakah query dijalankan dengan aman atau tidak
    if ($conn->query($sql) === TRUE) {
        // jika berhasil akan diarahkan ke halaman login
        echo "<script>alert('Data berhasil disimpan!');
        window.location='../../login';</script>";
    } else {
        // jika gagal akan diarahakan kembali ke halaman daftar        
        echo "<script>alert('Error : " . $conn->error . "');
        window.location='../../daftar';</script>";
    }
}

?>
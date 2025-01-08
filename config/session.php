<?php
session_start();

if (!isset($_SESSION['username'])) {

    echo "<script>alert('Silahkan login terlebih dahulu'); window.location = '../login/';</script>";
    exit();
}

// membuat data untuk session dari akun usernya
$nama_user = $_SESSION['username'];
$id_user = $_SESSION['id_user'];
$role = $_SESSION['role'];
$telp = $_SESSION['telp'];
$email = $_SESSION['email'];

// mengatur role untuk sessionnya
if ($role == 1) {
    $role = "guru";
} elseif($role == 0) {
    $role = "murid";
}

?>
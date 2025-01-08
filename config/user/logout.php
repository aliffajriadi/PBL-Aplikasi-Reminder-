<?php

session_start(); // memulai session

if (isset($_SESSION['username'])) {
    
    // jika session belum dibuat maka akan dipindahkan ke login

    // mengunset dan menghapus session saat ini
    session_unset();
    session_destroy();

    echo "<script>window.location='../../login';</script>";
} else {

    // jika sedang tidak login maka akan langsung dipindahkan ke halaman login
    echo "<script>alert('Anda tidak sedang login!');
    window.location='../../login';</script>";
}
?>
<?php 

    // membuat susunan konfigurasi koneksinya
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "lifetivity";

    // membuat koneksinya
    $conn = mysqli_connect($host, $user, $pass, $db);

    // jika koneksi gagal maka akan dikirim hasil errornya
    if(!$conn) {
        echo "Gagal terkoneksi : " . die(mysqli_error($conn));
    }

?>
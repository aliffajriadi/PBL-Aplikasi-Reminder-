<?php
    include '../koneksi.php';

    // mengambil data dari variabel post
    $id_tantangan = $_POST['id_tantangan'];
    $id_user = $_POST['user_id'];
    $nilai = $_POST['nilai'];

    // mengeksekusi query
    $execute = mysqli_query($conn, "UPDATE tantangan_stat SET nilai = '$nilai' WHERE id_tantangan = '$id_tantangan' AND id_user = '$id_user'");

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat
    // jika gagal akan muncul alert gagal dibuat
    if (!$execute) {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');
        window.location='../../tantangan/detail_tantangan.php?id_tantangan= $id_tantangan';</script>";
        

        header("Location: ../../tantangan/detail_tantangan.php?id_tantangan= $id_tantangan");
    } else {
        echo "<script>alert('Berhasil menambahkan nilai');
        window.location='../../tantangan/detail_tantangan.php?id_tantangan= $id_tantangan';</script>";
    }
    // setelah selesai maka akan dipindahkan ke halaman detail tantangannya

?>

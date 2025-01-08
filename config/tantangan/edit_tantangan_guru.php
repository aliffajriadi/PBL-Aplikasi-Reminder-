<?php
    
    include '../session.php';
    include '../koneksi.php';

    // mengambil semua data dari variable post
    $id_tantangan = $_POST['id_tantangan'];
    $judul_tantangan = $_POST['edit_judul_tantangan'];
    $tanggal_pengingat = $_POST['tanggal_pengingat'];
    $waktu_pengingat = $_POST['waktu_pengingat'];
    $isi_tantangan = $_POST['edit_isi_tantangan'];

    // mengeksekusi query
    $execute = mysqli_query($conn, "UPDATE tantangan SET 
    judul_tantangan = '$judul_tantangan', tanggal_pengingat = '$tanggal_pengingat', waktu_pengingat = '$waktu_pengingat', isi_tantangan = '$isi_tantangan' WHERE id_tantangan = $id_tantangan");

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika berhasil maka akan muncul alert berhasil 
    // jika gagal akan muncul alert gagal
    if($execute) {
        echo "<script>alert('Tantangan berhasil diedit');
        window.location='../../tantangan';</script>";
    } else {
        echo "<script>alert('Tantangan gagal diedit');
        window.location='../../tantangan';</script>";
    }
    // Setelah selesai maka akan halaman langsung dipindahkan ke halaman tantangan

?>


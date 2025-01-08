<?php 

include "../koneksi.php";
include "../session.php";

// mengambil data dari variabel post
$kode_tantangan = $_POST['kode_tantangan'];

// melihat apakah tantangannya ada atau tidak
$syarat1 = mysqli_query($conn, "SELECT id_tantangan FROM tantangan WHERE id_tantangan = $kode_tantangan");
$data_execute = mysqli_fetch_array($syarat1, MYSQLI_ASSOC);
if(mysqli_num_rows($syarat1) < 1){
    echo "<script>alert('kode tantangan tidak ditemukan')</script>";
    header("Location: ../../tantangan");
    exit();
}

// mengecek apakah user sudah menerima kode tantangannya agar tidak duplikat
$syarat2 = mysqli_query($conn, "SELECT id_tantangan FROM tantangan_stat WHERE id_tantangan = $kode_tantangan AND id_user = $id_user");
$data_execute = mysqli_fetch_array($syarat1, MYSQLI_ASSOC);
if(mysqli_num_rows($syarat2) > 0){
    echo "<script>alert('kode tantangan sudah anda gunakan')</script>";
    header("Location: ../../tantangan");
    exit();
}

// mengeksekusi query
$execute = mysqli_query($conn, "INSERT INTO tantangan_stat(id_tantangan, id_user, status_tantangan)
VALUES ('$kode_tantangan', '$id_user', 0)");

// mengecek apakah query dijalankan dengan aman atau tidak
// jika iya maka akan muncul alert berhasil dibuat
// jika gagal akan muncul alert gagal dibuat
if($execute){
    echo "<script>alert('tantangan berhasil di input');
    window.location='../../tantangan';</script>";
}else{
    echo "<script>alert('tantangan gagal di input');
    window.location='../../tantangan';</script>";
}
// Setelah selesai maka akan halaman langsung dipindahkan ke halaman tantangan

?>
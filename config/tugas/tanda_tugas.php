<?php
include '../koneksi.php';

$id_tugas = $_POST['id_tugas'];
$query = mysqli_query($conn, "UPDATE tugas SET status_tugas = '1' WHERE id_tugas = $id_tugas");

if ($query) {
    echo "<script>alert('Berhasil Menandai Sudah Selesai')</script>";
    header("Location: ../../tugas/");
} else {
    echo "<script>alert('Gagal Menandai Sudah Selesai')</script>";
    header("Location: ../../tugas/");
}

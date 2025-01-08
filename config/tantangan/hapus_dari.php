<?php
    include '../koneksi.php';

    // Ambil data dari GET dan validasi
    $id_tantangan = isset($_GET['id_tantangan']) ? mysqli_real_escape_string($conn, $_GET['id_tantangan']) : null;
    $id_user = isset($_GET['id_user']) ? mysqli_real_escape_string($conn, $_GET['id_user']) : null;

    // mengeksekusi Query untuk menghapus data
    $query = mysqli_query($conn, "DELETE FROM tantangan_stat WHERE id_tantangan='$id_tantangan' AND id_user='$id_user'");

    // mengecek apaka query ebrhasil dieksekusi atau tidak
    // jika berhasil maka akan muncul alert berhasil dihapus
    // jika gagal makan akan muncul alert gagal dihapus
    if (!$query) {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "'); 
        window.location='../../tantangan/';</script>";
    } else {
        echo "<script>alert('Berhasil menghapus data!'); window.location='../../tantangan/';</script>";
        exit;
    }
    // setelah itu langsung diarahkan ke halaman tantangan

?>

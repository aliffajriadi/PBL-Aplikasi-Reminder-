<?php 

    // file untuk menghapus jadwal tertentu dari suatu pengguna dari tabel database

    include "../koneksi.php";
    include "../session.php";

    // mengambil id tantangan dari variable post
    $id_jadwal = $_POST["id_jadwal"];

    // mengeksekusi query
    $execute = mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal = $id_jadwal");

    // setelah query dijalankan
    // jika berhail maka akan muncul alert berhasil
    // jika gagal maka akan muncul alert gagal
    if ($execute) {
        echo "<script>alert('Jadwal Berhasil dihapus'); 
            window.location='../../jadwal/';</script>";
    } else {
        echo "<script>alert('Jadwal Gagal Dihapus'); 
            window.location='../../jadwal/';</script>";
    }
    // setelah itu akan dipindahkan ke halaman jadwal
?>





<?php 

    include "../koneksi.php";
    include "../session.php";

    // mengambil data dari variabel post
    $id_tugas = $_POST["id_tugas"];

    // mengeksekusi query
    $execute = mysqli_query($conn, "DELETE FROM tugas WHERE id_tugas = '$id_tugas'");

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat
    // jika gagal akan muncul alert gagal dibuat
    if($execute) {
        echo "<script>
            alert('Tugas Berhasil Dihapus');
            window.location.href = '../../tugas/';
            </script>";
    }else{
        echo "<script>
            alert('Tugas Gagal Dihapus');
            window.location.href = '../../tugas/';
            </script>";
    }    

    // setelah selesai akan langsung diarahkan ke halaman tugas
?>
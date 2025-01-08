<?php 

    include "../koneksi.php";
    include "../session.php";

    // mengambil data dari variabel post
    $id_tantangan = $_GET["id_tantangan"];

    // mengeksekusi query
    $execute = mysqli_query($conn, "UPDATE tantangan_stat SET status_tantangan = 1 
    WHERE id_user = $id_user AND id_tantangan = $id_tantangan");

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat
    // jika gagal akan muncul alert gagal dibuat
    if($execute){
        echo "<script>alert('berhasil menandai sudah selesai');
        window.location='../../tantangan/';
        </script>";
        
    }else{
        echo "<script>alert('gagal menandai sudah selesai');
        window.location='../../tantangan/';
        </script>";
    }
    // setelah selesai langsung dipindahkan ke halaman tantangan
?>
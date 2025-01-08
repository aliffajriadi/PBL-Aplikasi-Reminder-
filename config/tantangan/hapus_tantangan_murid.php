<?php

    include "../koneksi.php";
    include "../session.php";

    // mengambil data dari variabel post
    $id_tantangan = $_POST["id_tantangan"];
    $id_user = $_SESSION['id_user'];

    // mengeksekusi query
    $execute = mysqli_query($conn, "DELETE FROM tantangan_stat WHERE id_user = $id_user AND id_tantangan = $id_tantangan"); 

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat
    // jika gagal akan muncul alert gagal dibuat
    if($execute){
        echo "<script>alert('tantangan berhasil di hapus');
        window.location='../../tantangan/';
        </script>";        
    }else{
        echo "<script>alert('tantangan gagal di hapus');
        window.location='../../tantangan/';
        </script>";
    }
    // seletah selesai maka akan diarahkan ke halaman tantangan
?>
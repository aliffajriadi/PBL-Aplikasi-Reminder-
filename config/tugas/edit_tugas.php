<?php 

    include "../koneksi.php";
    include "../session.php";

    // mengambil data dari variabel post
    $judul_tugas = $_POST["edit_judul_tugas"] ;
    $isi_tugas = $_POST["edit_isi_tugas"];
    $tanggal_pengingat = $_POST["edit_tanggal_pengingat"];
    $waktu_pengingat = $_POST["edit_waktu_pengingat"];
    $id_tugas = $_POST["id_tugas"];
    $status_tugas = $_POST["status_tugas"] == '1' ? 1 : 0;

    // mengeksekusi query
    $execute = mysqli_query($conn, "UPDATE tugas SET judul_tugas = '$judul_tugas', tanggal_pengingat = '$tanggal_pengingat', waktu_pengingat = '$waktu_pengingat', isi_tugas = '$isi_tugas', status_tugas = '$status_tugas' WHERE id_tugas = '$id_tugas'");

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat
    // jika gagal akan muncul alert gagal dibuat
    if($execute){
        echo "<script>alert('tugas berhasil di edit');
        window.location='../../tugas/';
        </script>";    
    }else{
        echo "<script>alert('tugas gagal di edit');
        window.location='../../tugas/';
        </script>";
    }

    // setelah selesai akan diarahkan ke halaman tugas
?>
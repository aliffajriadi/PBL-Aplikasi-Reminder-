<?php 
    include "../koneksi.php";
    include "../session.php";

    // mengambil id tantangan dari variable post
    $id_catatan = $_POST['id_catatan'];
    $judul_catatan = $_POST['judul_catatan'];
    $isi_catatan = $_POST['isi_catatan'];

    // mengeksekusi query
    $execute = mysqli_query($conn, "UPDATE catatan SET 
    judul_catatan = '$judul_catatan', isi_catatan = '$isi_catatan' WHERE id_catatan = '$id_catatan'");

    // setelah query dijalankan
    // jika berhail maka akan muncul alert berhasil diubah
    // jika gagal maka akan muncul alert gagal diubah
    if($execute) {
        echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href = '../../catatan/';
            </script>";
    }else{
        echo "<script>
                    alert('Data Gagal Diubah');
                    window.location.href = '../../catatan/';
            </script>";
    }
    // setelah itu akan dipindahkan ke halaman catatan
?>
<?php 
    include "../koneksi.php";
    include "../session.php";
    
    // mengambil id tantangan dari variable post
    $id_catatan = $_POST['id_catatan'];

    // mengeksekusi query
    $execute = mysqli_query($conn, "DELETE FROM catatan WHERE id_catatan = '$id_catatan'");

    // setelah query dijalankan
    // jika berhail maka akan muncul alert berhasil dihapus
    // jika gagal maka akan muncul alert gagal dihapus
    if($execute) {
        echo "<script>
                    alert('Catatan Berhasil Dihapus');
                    window.location.href = '../../catatan';
            </script>";
    }else{
        echo "<script>
                    alert('Catatan Gagal Dihapus');
                    window.location.href = '../../catatan';
            </script>";
    }
    // setelah itu akan dipindahkan ke halaman catatan
?>
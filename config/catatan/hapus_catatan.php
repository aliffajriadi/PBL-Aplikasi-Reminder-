<?php 
    include "../koneksi.php";
    include "../session.php";

    // mengambil id catatan dari variabel post
    $id_catatan = $_POST['id_catatan'];

    try {
        // mengeksekusi query untuk menghapus catatan
        $execute = mysqli_query($conn, "DELETE FROM catatan WHERE id_catatan = '$id_catatan'");

        // jika query gagal dieksekusi
        if (!$execute) {
            throw new Exception('Gagal menghapus catatan.');
        }

        // jika berhasil
        echo "<script>
                alert('Catatan Berhasil Dihapus');
                window.location.href = '../../catatan';
            </script>";
    } catch (Exception $e) {
        // menangani exception jika terjadi kesalahan
        echo "<script>
                alert('Catatan Gagal Dihapus: " . $e->getMessage() . "');
                window.location.href = '../../catatan';
            </script>";
    }
?>

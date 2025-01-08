<?php 
include '../koneksi.php';
include '../session.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    // mengambil id tantangan dari variable post
    $id_jadwal = $_POST['edit_id_jadwal'];
    $judul = $_POST['edit_judul_jadwal'];
    $tanggal_mulai = $_POST['edit_tanggal_mulai'];
    $tanggal_berakhir = $_POST['edit_tanggal_berakhir'];
    $waktu_pengingat = $_POST['edit_waktu_pengingat'];
    $isi_jadwal = $_POST['edit_isi_jadwal'];

    $data_hari = $_POST['list_hari'];
    $list_hari = [0, 0, 0, 0, 0, 0, 0]; // Default semua hari = 0

    if (isset($_POST['list_hari'])) {
        foreach ($_POST['list_hari'] as $index => $value) {
            if (is_numeric($index) && $index >= 0 && $index <= 6) {
                $list_hari[$index] = 1; // Set ke 1 jika checkbox dicentang
            }
        }
    }

    // menginisiasi query
    $query = "
        UPDATE jadwal 
        SET 
            judul_jadwal = '$judul',
            tanggal_mulai = '$tanggal_mulai',
            tanggal_selesai = '$tanggal_berakhir',
            waktu_pengingat = '$waktu_pengingat',
            isi_jadwal = '$isi_jadwal',
            senin = $list_hari[0],
            selasa = $list_hari[1],
            rabu = $list_hari[2],
            kamis = $list_hari[3],
            jumat = $list_hari[4],
            sabtu = $list_hari[5],
            minggu = $list_hari[6]
        WHERE id_jadwal = $id_jadwal
    ";

    // mengeksekusi query
    // setelah query dijalankan
    // jika berhail maka akan muncul alert berhasil
    // jika gagal maka akan muncul alert gagal
    if (mysqli_query($conn, $query)) {
        echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href = '../../jadwal/';
            </script>";
    } else {
        echo "<script>
                    alert('Data Gagal Diubah');
                    window.location.href = '../../jadwal/';
            </script>" . mysqli_error($conn);
    }
    // setelah itu akan dipindahkan ke halaman jadwal

}
?>

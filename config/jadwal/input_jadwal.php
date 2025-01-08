<?php
include '../session.php';
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari variabel POST
    $judul_jadwal = $_POST['judul_jadwal'];
    $isi_jadwal = $_POST['isi_jadwal'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];
    $waktu_pengingat = $_POST['waktu_pengingat'];
    
    $data_hari = $_POST['list_hari']; // Mengambil data list hari dari checkbutton sebelumnya
    $list_hari = [0, 0, 0, 0, 0, 0, 0]; // Default semua hari = 0

    // Mengecek apakah checkboxnya di check atau tidak 
    // jika iya maka akan direturn true ke dalam database
    if (isset($_POST['list_hari'])) {
        foreach ($_POST['list_hari'] as $index => $value) {
            if (is_numeric($index) && $index >= 0 && $index <= 6) {
                $list_hari[$index] = 1; // Set ke 1 jika checkbox dicentang
            }
        }
    }
    
    // Mengeksekusi Query
    $execute = mysqli_query($conn, "INSERT INTO jadwal
    (judul_jadwal, isi_jadwal, tanggal_mulai, tanggal_selesai, waktu_pengingat, senin, selasa, rabu, kamis, jumat, sabtu, minggu, id_user) VALUES 
    ('$judul_jadwal', '$isi_jadwal', '$tanggal_mulai', '$tanggal_berakhir', '$waktu_pengingat', '$list_hari[0]', '$list_hari[1]', '$list_hari[2]', '$list_hari[3]', '$list_hari[4]', '$list_hari[5]', '$list_hari[6]', $id_user)");

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat
    // jika gagal akan muncul alert gagal dibuat
    if($execute) {
        echo "<script>alert('Jadwal Berhasil Dibuat');
            window.location='../../jadwal/';</script>";
    }else {
        echo "<script>alert('Jadwal Gagal Dibuat');
            window.location='../../jadwal/';</script>";
    }
    // Setelah selesai maka akan halaman langsung dipindahkan ke halaman jadwal

}

?>
<?php 

    // Sertakan koneksi ke database dan sesi pengguna
    // include "../koneksi.php";
    // include "../session.php";

    // Ambil data dari form yang dikirim menggunakan metode POST
    // $judul_tantangan = $_POST["judul_tantangan"];
    // $isi_tantangan = $_POST["isi_tantangan"];
    // $tanggal_pengingat = $_POST["tanggal_pengingat"];
    // $jam_pengingat = $_POST["waktu_pengingat"];

    // Jalankan query untuk memasukkan data tantangan ke dalam tabel 'tantangan'
    // $execute = mysqli_query($conn, "INSERT INTO tantangan(judul_tantangan, isi_tantangan, tanggal_pengingat, waktu_pengingat, id_pembuat) 
    // VALUES ('$judul_tantangan', '$isi_tantangan', '$tanggal_pengingat', '$jam_pengingat', '$id_user')");

    // Ambil ID dari tantangan yang baru saja dimasukkan
    // $id_tantangan = mysqli_insert_id($conn);

    // Periksa apakah query berhasil dijalankan
    // Jika query berhasil (execute):
    //     - Tampilkan pesan alert yang mengatakan "Tantangan berhasil dibuat" dengan menampilkan ID tantangan
    //     - Alihkan halaman ke halaman tantangan
    // if ($execute) {
    //     echo "<script>alert('tantangan berhasil dibuat. Id tantangan = " . $id_tantangan .  "');
    //     window.location='../../tantangan';</script>";
    // } else {
    //     // Jika query gagal:
    //     // Tampilkan pesan alert yang mengatakan "Tantangan gagal dibuat"
    //     // Alihkan halaman ke halaman tantangan
    //     echo "<script>alert('tantangan gagal dibuat');
    //     window.location='../../tantangan';</script>";
    // }

    // Setelah selesai maka halaman langsung dipindahkan ke halaman tantangan


    include "../koneksi.php";
    include "../session.php";

    // mengambil data dari variabel post
    $judul_tantangan = $_POST["judul_tantangan"] ;
    $isi_tantangan = $_POST["isi_tantangan"];
    $tanggal_pengingat = $_POST["tanggal_pengingat"];
    $jam_pengingat = $_POST["waktu_pengingat"];

    // mengeksekusi queri
    $execute = mysqli_query($conn, "INSERT INTO tantangan(judul_tantangan, isi_tantangan, tanggal_pengingat, waktu_pengingat, id_pembuat) 
    VALUES ('$judul_tantangan', '$isi_tantangan', '$tanggal_pengingat', '$jam_pengingat', '$id_user')");

    // mengambil id dari data yang diinsert terakhir kali dari koneksi oleh masing masing user
    $id_tantangan = mysqli_insert_id($conn);    

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat dan memunculkan id tantangannya
    // jika gagal akan muncul alert gagal dibuat
    if($execute){
        echo "<script>alert('tantangan berhasil dibuat. Id tantangan = " . $id_tantangan .  "');
        window.location='../../tantangan';</script>";
    }else{
        echo "<script>alert('tantangan gagal dibuat');
        window.location='../../tantangan';</script>";
    }
    // Setelah selesai maka akan halaman langsung dipindahkan ke halaman tantangan

?>

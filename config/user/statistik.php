<?php
// total statistik si pengguna

// mengambil jumlah isi dari tabel yang kita pilih dengan fungsi count
// lalu mengambil nilai dari column yang sudah ditentukan

$get_catatan_count = mysqli_query($conn, "SELECT COUNT(id_catatan) AS total_catatan FROM catatan WHERE id_user = '$id_user'");
$catatan_count = mysqli_fetch_assoc($get_catatan_count)['total_catatan'];

$get_jadwal_count = mysqli_query($conn, "SELECT COUNT(id_jadwal) AS total_jadwal FROM jadwal WHERE id_user = '$id_user'");
$jadwal_count = mysqli_fetch_assoc($get_jadwal_count)['total_jadwal'];

$get_tugas_count = mysqli_query($conn, "SELECT COUNT(id_tugas) AS total_tugas FROM tugas WHERE id_user = '$id_user'");
$tugas_count = mysqli_fetch_assoc($get_tugas_count)['total_tugas'];


if ($role == 'murid') {

    // jika rolenya murid maka akan diambil dari tabel tantangan_stat
    // Query untuk mendapatkan jumlah tantangan jika role adalah 0
    $get_tantangan_count = mysqli_query($conn, "SELECT COUNT(id_tantangan) AS total_tantangan FROM tantangan_stat WHERE id_user = '$id_user'");
    $tantangan_count = mysqli_fetch_assoc($get_tantangan_count)['total_tantangan'];

} else {

    // jika rolenya guru maka akan diambil dari tabel tantangan
    // Query untuk mendapatkan jumlah tantangan jika role bukan 0
    $get_tantangan_count = mysqli_query($conn, "SELECT COUNT(id_tantangan) AS total_tantangan FROM tantangan WHERE id_pembuat = '$id_user'");
    $tantangan_count = mysqli_fetch_assoc($get_tantangan_count)['total_tantangan'];
}

?>
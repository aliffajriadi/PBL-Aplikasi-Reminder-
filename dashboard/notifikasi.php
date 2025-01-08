<?php


$besok = date('Y-m-d', strtotime('+24 hours'));
$sekarang = date('Y-m-d', strtotime('+0 day'));

$notifications = [];

// Query untuk tantangan (jika role adalah 'murid')
if ($_SESSION['role'] == 'murid') {
    $querinotif_tantangan = "SELECT tanggal_pengingat AS tanggal_tantangan, judul_tantangan 
    FROM tantangan 
    WHERE tanggal_pengingat = '$besok' AND id_tantangan IN 
    (SELECT id_tantangan FROM tantangan_stat WHERE id_user = $id_user AND status_tantangan = 0)";

    $result_tantangan = mysqli_query($conn, $querinotif_tantangan);

    // Mengambil data notifikasi untuk tantangan
    if ($result_tantangan && mysqli_num_rows($result_tantangan) > 0) {
        while ($row = mysqli_fetch_assoc($result_tantangan)) {
            $notifications[] = [
                'type' => 'info',
                'message' => "Jangan lupa! Tantangan '" . $row['judul_tantangan'] . "' dijadwalkan pada Besok " . $row['tanggal_tantangan'] . " Belum Diselesaikan."
            ];
        }
    }
}

// Query untuk tugas
$querinotif = "SELECT tanggal_pengingat, judul_tugas, waktu_pengingat 
               FROM tugas 
               WHERE tanggal_pengingat = '$besok' AND id_user = $id_user AND status_tugas = '0'";

$result = mysqli_query($conn, $querinotif);

// Mengambil data notifikasi untuk tugas
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $notifications[] = [
            'type' => 'info',
            'message' => "Jangan lupa! Tugas '" . $row['judul_tugas'] . "' dijadwalkan pada Besok " . $row['tanggal_pengingat'] . " Jam " . $row['waktu_pengingat'] . " Belum Diselesaikan."
        ];
    }
}

// Menampilkan notifikasi
if (!empty($notifications)) {
    foreach ($notifications as $notif) {
        echo "<div class='alert bi bi-exclamation-square alert-{$notif['type']} alert-dismissible fade show' role='alert'>
                " . htmlspecialchars($notif['message']) . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
} else {
    echo "<div class='alert alert-info bi bi-check-all' role='alert'> Tidak ada notifikasi untuk besok.</div>";
}

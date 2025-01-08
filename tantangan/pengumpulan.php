<?php
// Include file koneksi
include '../config/koneksi.php';

// Cek apakah metode request adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $keterangan = $_POST['keterangan'];
    $id_tantangan = $_POST['id_tantangan'];

    // Cek apakah file diunggah tanpa error
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $targetDir = "../asset/uploads/pengumpulan"; // Direktori tujuan
        $fileName = basename($_FILES['file']['name']); // Nama file
        $targetFilePath = $targetDir . DIRECTORY_SEPARATOR . $fileName; // Path lengkap

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            $query = "UPDATE tantangan_stat SET keterangan = ?, bukti = ? WHERE id_tantangan = ?"; // Query SQL

            // Siapkan statement SQL
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                // Bind parameter ke statement
                mysqli_stmt_bind_param($stmt, 'ssi', $keterangan, $targetFilePath, $id_tantangan);

                // Eksekusi statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Pengumpulan Berhasil');</script>";
                    header("Location: index.php");
                    exit();
                } else {
                    // Error saat eksekusi statement
                    echo "Error: " . mysqli_stmt_error($stmt);
                }

                // Tutup statement
                mysqli_stmt_close($stmt);
            } else {
                // Error saat menyiapkan statement
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Error saat memindahkan file
            echo "<script>alert('Pengumpulan Gagal');</script>";
            header("Location: index.php");
        }
    } else {
        // Error jika file tidak ditemukan atau terjadi kesalahan
        echo "<script>alert('File tidak ditemukan atau terjadi kesalahan saat mengunggah.');</script>";
        header("Location: index.php");
    }
}

// Tutup koneksi database
mysqli_close($conn);

<?php
// Include file sidebar
include "../asset/component/sidebar.php";

// Ambil ID user dari sesi
$id_user = $_SESSION['id_user'];

// Cek apakah ada parameter pencarian (search)
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query utama untuk mengambil data tugas berdasarkan id_user
$query = "SELECT id_tugas, judul_tugas, isi_tugas, tanggal_pengingat, waktu_pengingat, status_tugas FROM tugas WHERE id_user = $id_user";

// Tambahkan filter pencarian jika ada keyword search
if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    $query .= " AND (judul_tugas LIKE '%$search%' OR isi_tugas LIKE '%$search%' OR tanggal_pengingat LIKE '%$search%')";
}

// Eksekusi query
$get_tugas = mysqli_query($conn, $query);
?>

<div class="isi_tugas">
    <!-- Header Halaman -->
    <div class="d-flex justify-content-between content-title">
        <h2><b>Halaman Tugas</b></h2>

        <!-- Form Pencarian -->
        <form class="d-flex" method="GET" action="">
            <input class="form-control me-2" type="search" name="search" placeholder="Cari Tugas" aria-label="Search" value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>

        <!-- Tombol Tambah Tugas -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_tugas">Tambah Tugas</button>
    </div>

    <!-- Tampilkan Data Tugas -->
    <?php if (mysqli_num_rows($get_tugas)) : ?>
        <?php $data_tugas = mysqli_fetch_all($get_tugas, MYSQLI_ASSOC);
        foreach ($data_tugas as $data) : ?>
            <div class="tampil-tugas pb-5">
                <div class="d-flex justify-content-between">
                    <!-- Judul Tugas -->
                    <div class="judul-tugas"><?= htmlspecialchars($data['judul_tugas']); ?></div>

                    <!-- Menu Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="../config/tugas/tanda_tugas.php?id_tugas=<?= $data['id_tugas'] ?>" method="post">
                                    <input type="hidden" name="id_tugas" value="<?= $data['id_tugas'] ?>">
                                    <button type="submit" class="btn dropdown-item ">
                                        <i class="fas fa-info bi bi-check2"></i> Tandai Sudah Selesai
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="../config/tugas/hapus_tugas.php" method="post">
                                    <input type="hidden" name="id_tugas" value="<?= $data['id_tugas'] ?>">
                                    <button type="submit" class="btn dropdown-item">
                                        <i class="fas fa-trash bi bi-trash"></i> Hapus Tugas
                                    </button>
                                </form>
                            </li>
                            <li>
                                <button class="btn dropdown-item edit-tugas"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal_edit_tugas"
                                    data-id-tugas="<?= $data['id_tugas'] ?>"
                                    data-judul-tugas="<?= htmlspecialchars($data['judul_tugas']); ?>"
                                    data-tanggal-pengingat="<?= $data['tanggal_pengingat'] ?>"
                                    data-waktu-pengingat="<?= $data['waktu_pengingat'] ?>"
                                    data-isi-tugas="<?= htmlspecialchars($data['isi_tugas']); ?>">
                                    <i class="fas fa-edit bi bi-pencil"></i> Edit Tugas
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Detail Tugas -->
                <div class="tanggal-tugas <?= $data['status_tugas'] == 0 ? "text-danger" : "text-success";?>">
                    <b><?= $data['status_tugas'] == 0 ? "Belum dikerjakan" : "Sudah dikerjakan"; ?></b>
                </div>
                <div class="tanggal-tugas">
                    <?= $data['tanggal_pengingat']; ?> <?= $data['waktu_pengingat']; ?>
                </div>
                <div class="isi-tugas">
                    <?= nl2br(htmlspecialchars($data['isi_tugas'])); ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Tidak ada tugas sama sekali.</p>
    <?php endif; ?>
</div>

<?php
// Include file footer
include "../asset/component/footer.php";
?>
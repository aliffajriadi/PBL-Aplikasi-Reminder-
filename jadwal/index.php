<?php
include "../asset/component/sidebar.php";
$id_user = $_SESSION['id_user'];

$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT id_jadwal, judul_jadwal, isi_jadwal, tanggal_mulai, tanggal_selesai, waktu_pengingat, senin, selasa, rabu, kamis, jumat, sabtu, minggu 
          FROM jadwal 
          WHERE id_user = $id_user";

if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    $query .= " AND (judul_jadwal LIKE '%$search%' OR isi_jadwal LIKE '%$search%' OR tanggal_mulai LIKE '%$search%' OR tanggal_selesai LIKE '%$search%')";
}

$get_jadwal = mysqli_query($conn, $query);
?>

<div class="isi_jadwal">
    <div class="d-flex justify-content-between content-title">
        <h2><b>Halaman Jadwal</b></h2>
        <form class="d-flex" method="GET" action="">
            <input class="form-control me-2" type="search" name="search" placeholder="Cari Jadwal" aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_jadwal">Tambah Jadwal</button>
    </div>

    <?php
    if (mysqli_num_rows($get_jadwal)) {
        $data_jadwal = mysqli_fetch_all($get_jadwal, MYSQLI_ASSOC);
        foreach ($data_jadwal as $data) {
    ?>
            <div class="tampil-jadwal pb-5">
            <div class="d-flex justify-content-between"> 
                <div class="judul-jadwal"><?= $data["judul_jadwal"]; ?></div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="../config/jadwal/hapus_jadwal.php" method="post">
                                <input type="hidden" name="id_jadwal" value="<?= $data['id_jadwal'] ?>">
                                <button type="submit" class="btn dropdown-item">
                                    <i class="fas fa-edit bi bi-trash"></i>Hapus Jadwal
                                </button>
                            </form>
                        
                        <li>
                            <button class="btn dropdown-item edit-jadwal"
                            data-bs-toggle="modal"
                            data-bs-target="#modal_edit_jadwal"
                            data-id-jadwal="<?= $data['id_jadwal'] ?>"
                            data-judul-jadwal="<?= $data['judul_jadwal'] ?>"
                            data-tanggal-mulai="<?= $data['tanggal_mulai'] ?>"
                            data-tanggal-selesai="<?= $data['tanggal_selesai'] ?>"
                            data-waktu-pengingat-jadwal="<?= $data['waktu_pengingat'] ?>"
                            data-isi-jadwal="<?= $data['isi_jadwal'] ?>"
                            data-senin="<?= $data['senin'] ?>"
                            data-selasa="<?= $data['selasa'] ?>"
                            data-rabu="<?= $data['rabu'] ?>"
                            data-kamis="<?= $data['kamis'] ?>"
                            data-jumat="<?= $data['jumat'] ?>"
                            data-sabtu="<?= $data['sabtu'] ?>"
                            data-minggu="<?= $data['minggu'] ?>">
                                <i class="fas fa-edit bi bi-pencil"></i> Edit Jadwal
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tanggal-jadwal"><?= $data["tanggal_mulai"] ?> - <?= $data["tanggal_selesai"] ?></div>
            <div class="isi-jadwal"><?= $data["isi_jadwal"] ?></div>
        </div>
    <?php
        }
    } else {
        echo "Tidak ada jadwal ditemukan.";
    }
    ?>
</div>

<?php
include "../asset/component/footer.php";
?>

<?php
include "../asset/component/sidebar.php";
include '../config/user/statistik.php';
?>

<div class="text-primary mb-3">
    <h2><b>Beranda</b></h2>
</div>

<!-- ini untuk menampilkan notification melalui file luar -->
<?php include 'notifikasi.php'; ?>

<!-- kotak statistik -->

<div class="row mb-4">

    <h5 class="text-primary">Statistik :</h5>

    <div class="col-md-3 mb-3">
        <a href="../catatan/" class="text-decoration-none">
            <div class="card text-center bg-info text-white shadow-sm rounded-lg border- h0over-custom">
                <div class="card-body py-4">
                    <h5 class="card-title fs-4 fw-bold">Catatan</h5>
                    <p class="card-text fs-3"><?= $catatan_count; ?></p>
                </div>
            </div>
        </a>
    </div>



    <div class="col-md-3 mb-3">
        <a href="../jadwal/" class="text-decoration-none">
            <div class="card text-center bg-success text-white shadow-sm rounded-lg border-0 hover-custom">
                <div class="card-body py-4">
                    <h5 class="card-title fs-4 fw-bold">Jadwal</h5>
                    <p class="card-text fs-3"><?= $jadwal_count; ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-3">
        <a href="../tugas/" class="text-decoration-none">
            <div class="card text-center bg-warning text-white shadow-sm rounded-lg border-0 hover-custom">
                <div class="card-body py-4">
                    <h5 class="card-title fs-4 fw-bold">Tugas</h5>
                    <p class="card-text fs-3"><?= $tugas_count; ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-3">
        <a href="../tantangan/" class="text-decoration-none">
            <div class="card text-center bg-primary text-white shadow-sm rounded-lg border-0 hover-custom">
                <div class="card-body py-4">
                    <h5 class="card-title fs-4 fw-bold">Tantangan</h5>
                    <p class="card-text fs-3"><?= $tantangan_count; ?></p>
                </div>
            </div>
        </a>
    </div>


</div>


<!-- Bagian Jadwal -->
<div class="isi_jadwal">
    <h2 class="content-title">Tantangan</h2>


    <?php if ($role === 'guru'): ?>

        <?php
        $get_jadwal = mysqli_query($conn, "SELECT id_tantangan, judul_tantangan, isi_tantangan, tanggal_pengingat, waktu_pengingat FROM tantangan WHERE id_pembuat = '$id_user' LIMIT 3");

        if (mysqli_num_rows($get_jadwal)) {
            $data_jadwal = mysqli_fetch_all($get_jadwal, MYSQLI_ASSOC);
            foreach ($data_jadwal as $data) {
        ?>
                <div class="tampil-jadwal">
                    <div class="judul-tantangan">
                        <h4><b><?= $data["judul_tantangan"]; ?></b></h4>
                    </div>
                    <div class="tanggal-tantangan"><?= $data["tanggal_pengingat"] ?> <?= $data["waktu_pengingat"] ?></div>
                    <div class="isi-tantangan"><?= $data["isi_tantangan"] ?></div>

                </div>
        <?php
            }
        } else {
            echo "Belum ada jadwal dibuat :)";
        }
        ?>

    <?php elseif ($role === 'murid'): ?>

        <?php

        $get_jadwal = mysqli_query(
            $conn,
            "SELECT tantangan.id_tantangan AS id_tantangan, 
    tantangan.judul_tantangan AS judul_tantangan, 
    tantangan.isi_tantangan AS isi_tantangan, 
    tantangan.tanggal_pengingat AS tanggal_pengingat, 
    tantangan.waktu_pengingat AS waktu_pengingat, 
    users.username AS pembuat 
    FROM tantangan_stat INNER JOIN tantangan ON tantangan_stat.id_tantangan = tantangan.id_tantangan 
    INNER JOIN users ON tantangan.id_pembuat = users.id
    WHERE id_user = $id_user LIMIT 3"
        );

        if (mysqli_num_rows($get_jadwal)) {
            $data_jadwal = mysqli_fetch_all($get_jadwal, MYSQLI_ASSOC);
            foreach ($data_jadwal as $data) {
        ?>
                <div class="tampil-jadwal">
                    <?= $data["pembuat"] ?>
                    <div class="judul-tantangan"><?= $data["judul_tantangan"]; ?></div>
                    <div class="tanggal-tantangan"><?= $data["tanggal_pengingat"] ?> <?= $data["waktu_pengingat"] ?></div>
                    <div class="isi-tantangan"><?= $data["isi_tantangan"] ?></div>

                </div>
        <?php
            }
        } else {
            echo "Belum ada jadwal diikuti :)";
        }
        ?>
    <?php endif; ?>
</div>

<!-- Bagian Jadwal -->
<div class="isi_jadwal">
    <h2 class="content-title">Jadwal</h2>

    <?php
    $get_jadwal = mysqli_query($conn, "SELECT id_jadwal, judul_jadwal, isi_jadwal, tanggal_mulai, tanggal_selesai, senin, selasa, rabu, kamis, jumat, sabtu, minggu FROM jadwal WHERE id_user = '$id_user' LIMIT 3");

    if (mysqli_num_rows($get_jadwal)) {
        $data_jadwal = mysqli_fetch_all($get_jadwal, MYSQLI_ASSOC);
        foreach ($data_jadwal as $data) {
    ?>
            <div class="tampil-jadwal">
                <div class="judul-jadwal"><?= $data["judul_jadwal"]; ?></div>
                <div class="tanggal-jadwal"><?= $data["tanggal_mulai"] ?> - <?= $data["tanggal_selesai"] ?></div>
                <div class="isi-jadwal"><?= $data["isi_jadwal"] ?></div>

            </div>
    <?php
        }
    } else {
        echo "Belum ada jadwal dibuat :)";
    }
    ?>
</div>

<!-- Bagian Tugas -->
<div class="isi_tugas">
    <h2 class="content-title">Tugas</h2>

    <?php
    $get_tugas = mysqli_query(
        $conn,
        "SELECT id_tugas, judul_tugas, isi_tugas, tanggal_pengingat, waktu_pengingat, status_tugas 
    FROM tugas WHERE id_user = '$id_user'"
    );

    if (mysqli_num_rows($get_tugas)) {
        $data_tugas = mysqli_fetch_all($get_tugas, MYSQLI_ASSOC);
        foreach ($data_tugas as $data) {
    ?>
            <div class="tampil-tugas">
                <div class="judul-tugas"><?= $data['judul_tugas']; ?></div>
                <div class="tanggal-tugas"><?= $data['tanggal_pengingat']; ?> <?= $data['waktu_pengingat']; ?></div>
                <div class="tanggal-tugas"><b><?= $data['status_tugas'] == 0 ? "Belum dikerjakan" : "Sudah dikerjakan"; ?></b>
                </div>
                <div class="isi-tugas"><?= $data['isi_tugas']; ?> </div>
            </div>
    <?php
        }
    } else {
        echo "tidak ada tugas sama sekali";
    }
    ?>
</div>

<!-- Bagian Catatan -->
<div class="isi_catatan">
    <div class="d-flex justify-content-between content-title">
        <h2 class=""><b>Catatan</b></h2>
    </div>
    <?php
    $get_catatan = mysqli_query(
        $conn,
        "SELECT id_catatan, judul_catatan, isi_catatan 
    FROM catatan WHERE id_user = '$id_user' LIMIT 3"
    );

    if (mysqli_num_rows($get_catatan)) {
        $data_catatan = mysqli_fetch_all($get_catatan, MYSQLI_ASSOC);
        foreach ($data_catatan as $data) {
    ?>
            <div class="tampil-catatan">
                <div class="judul-catatan"><?= $data['judul_catatan'] ?></div>
                <div class="isi-catatan"><?= $data['isi_catatan'] ?></div>
            </div>
    <?php
        }
    } else {
        echo "Catatan Belum Dibuat";
    }
    ?>
</div>

<?php
include "../asset/component/footer.php";
?>
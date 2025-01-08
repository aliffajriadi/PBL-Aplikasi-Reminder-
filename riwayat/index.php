<?php
include "../asset/component/sidebar.php";
?>

<div class="isi_tugas">
    <div class="d-flex justify-content-between content-title">
        <h2 class=""><b>Halaman Riwayat</b></h2>
    </div>

    <?php if ($role === 'guru'): ?>
        <div class="d-flex justify-content-between mb-3 text-primary">
            <h4 class=""><b>Tugas :</b></h4>
        </div>
        <?php
        $query = "SELECT id_tugas, judul_tugas, isi_tugas, tanggal_pengingat, waktu_pengingat, status_tugas FROM tugas WHERE id_user = $id_user AND status_tugas = 1";
        $get_tugas = mysqli_query($conn, $query);
        ?>

        <?php
        if (mysqli_num_rows($get_tugas)) {
            $data_tugas = mysqli_fetch_all($get_tugas, MYSQLI_ASSOC);
            foreach ($data_tugas as $data) {
        ?>
                <div class="tampil-tugas pb-5">
                    <div class="d-flex justify-content-between">
                        <div class="judul-tugas"><?= $data['judul_tugas']; ?></div>
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                            <ul class="dropdown-menu">


                                <li><a href="../config/tugas/hapus_tugas.php?id_tugas=<?= $data['id_tugas'] ?>" class="dropdown-item">Klik Untuk Hapus Tugas</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tanggal-tugas text-success"><b><?= $data['status_tugas'] == 0 ? "Belum dikerjakan" : "Sudah dikerjakan"; ?></b></div>
                    <div class="tanggal-tugas"><?= $data['tanggal_pengingat']; ?> <?= $data['waktu_pengingat']; ?></div>
                    <div class="isi-tugas"><?= $data['isi_tugas']; ?> </div>
                </div>

        <?php
            }
        } else {
            echo "Tugas belum selesai / belum ada";
        }
        ?>
</div>

<?php elseif ($role === 'murid'): ?>
    <div class="d-flex justify-content-between mb-3 text-primary">
        <h4 class=""><b>Tantangan :</b></h4>
    </div>
    <?php
        $get_tantangan = mysqli_query($conn, "SELECT tantangan.id_tantangan AS id_tantangan, 
    tantangan.judul_tantangan AS judul_tantangan, 
    tantangan.isi_tantangan AS isi_tantangan, 
    tantangan.tanggal_pengingat AS tanggal_pengingat, 
    tantangan.waktu_pengingat AS waktu_pengingat, 
    users.username AS pembuat 
    FROM tantangan_stat INNER JOIN tantangan ON tantangan_stat.id_tantangan = tantangan.id_tantangan 
    INNER JOIN users ON tantangan.id_pembuat = users.id
    WHERE id_user = $id_user AND tantangan_stat.status_tantangan = 1 ");

        if (mysqli_num_rows($get_tantangan)) {
            $data_tantangan = mysqli_fetch_all($get_tantangan, MYSQLI_ASSOC);
            foreach ($data_tantangan as $data) {
    ?>

            <div class="tampil-tugas">
                <div class="judul-tantangan d-flex justify-content-between">
                    <h3><b><?= $data['judul_tantangan']; ?></b></h3>
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hapus
                        </button>

                        <ul class="dropdown-menu">
                            <li>
                                <form action="../config/tantangan/hapus_tantangan.php" method="POST">
                                    <input type="hidden" name="id_tantangan" value="<?= $data['id_tantangan'] ?>">
                                    <button type="submit" class="btn dropdown-item">Klik Untuk Hapus</button>
                                </form>    
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="status-tantangan">
                    <?php
                    $get_stat = mysqli_query($conn, "SELECT * FROM tantangan_stat WHERE id_tantangan = '{$data['id_tantangan']}' AND id_user = '$id_user'");
                    $stat = mysqli_fetch_assoc($get_stat);
                    if ($stat['status_tantangan'] == 0) {
                        echo "<div class='text-danger'><b>Belum Selesai</b></div>";
                    } else {
                        echo "<div class='text-success'><b>Selesai</b></div>";
                    }
                    ?>
                </div>

                <div class="d-flex justify-content-between">
                    <h6><b>Guru : <?php echo ucfirst($data["pembuat"]); ?></b></h6>
                </div>

                <?php if (!empty($stat['nilai'])): ?>
                    <div>Nilai : <b class="<?php echo ($stat['nilai'] <= 50) ? 'text-danger' : 'text-success'; ?>">
                            <?= $stat['nilai'] ?>
                        </b></div>
                <?php endif; ?>



                <div class="tanggal-tantangan"><?= $data["tanggal_pengingat"] ?> <?= $data["waktu_pengingat"] ?></div>

                <div class="isi-tantangan"><?= $data["isi_tantangan"] ?></div>

                <?php
                $query = mysqli_query($conn, "SELECT keterangan, bukti FROM tantangan_stat WHERE id_tantangan = '{$data['id_tantangan']}' AND id_user = '$id_user'");
                $stat = mysqli_fetch_assoc($query);
                ?>

                <hr>
                <div>
                    <h6><b>Hasil Tantangan</b></h6>
                    <div class="">
                        <div class="isi-tantangan">
                            <?= $stat["keterangan"] ?>
                        </div>
                        <div class="isi-tantangan">
                            <?php
                            // Pastikan data['bukti'] berisi path file yang valid
                            $filePath = $stat['bukti'];

                            if (!empty($filePath) && file_exists($filePath)) {
                                // Tampilkan tautan untuk mengunduh file
                                echo '<a href="' . htmlspecialchars($filePath) . '" download>Download Bukti</a>';
                            } else {
                                // Tampilkan pesan jika file tidak tersedia
                                echo 'File Belum Ditambahkan';
                            }
                            ?>

                        </div>
                    </div>
                </div>



            </div>
    <?php
            }
        } else {
            echo "Tantangan Belum Ada / Belum Selesai :)";
        }
    ?>
    <div class="d-flex justify-content-between my-3 text-primary">
        <h4 class=""><b>Tugas :</b></h4>
    </div>
    <?php

        $query = "SELECT id_tugas, judul_tugas, isi_tugas, tanggal_pengingat, waktu_pengingat, status_tugas FROM tugas WHERE id_user = $id_user AND status_tugas = 1";
        $get_tugas = mysqli_query($conn, $query);
    ?>

    <?php
        if (mysqli_num_rows($get_tugas)) {
            $data_tugas = mysqli_fetch_all($get_tugas, MYSQLI_ASSOC);
            foreach ($data_tugas as $data) {
    ?>
            <div class="tampil-tugas pb-5">
                <div class="d-flex justify-content-between">
                    <div class="judul-tugas">
                        <h3><b><?= $data['judul_tugas']; ?></b></h3>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                        <ul class="dropdown-menu">
                            <li><a href="../config/tugas/hapus_tugas.php?id_tugas=<?= $data['id_tugas'] ?>" class="dropdown-item">Klik Untuk Hapus Tugas</a></li>
                        </ul>
                    </div>
                </div>

                <div class="tanggal-tugas text-success"><b><?= $data['status_tugas'] == 0 ? "Belum dikerjakan" : "Sudah dikerjakan"; ?></b></div>
                <div class="tanggal-tugas"><?= $data['tanggal_pengingat']; ?> <?= $data['waktu_pengingat']; ?></div>
                <div class="isi-tugas"><?= $data['isi_tugas']; ?> </div>
            </div>

    <?php
            }
        } else {
            echo "Tugas Belum Ada / Belum Selesai)";
        }
    ?>
<?php endif; ?>

</div>

<?php
include "../asset/component/footer.php";
?>
<?php
include "../asset/component/sidebar.php";

// mengecek apakah ada variabel isi dari variabel search atau tidak
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!-- isi konten halaman tantangan -->
<div class="isi_tugas">
    <div class="d-flex justify-content-between content-title">
        <h2 class=""><b>Halaman Tantangan</b></h2>
        <form class="d-flex" role="search" method="GET" action="">
            <input class="form-control me-2" type="search" name="search" placeholder="Cari Tantangan" aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>

        <!-- tombol menambahkan tantangan -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="<?= $role === "guru" ? "#modal_tantangan_guru" : "#modal_tantangan_murid" ?>">
            Tambah tantangan
        </button>
    </div>

    <!-- jika rolenya guru maka akan ditampilkan tantangan yang telah dibuat gurunya -->
    <?php if ($role === 'guru'): ?>
        <?php
        // mengambil data tangangan untuk guru dari tabel tantangan
        $get_tantangan = mysqli_query($conn, "SELECT id_tantangan, judul_tantangan, isi_tantangan, tanggal_pengingat, waktu_pengingat 
            FROM tantangan WHERE id_pembuat = '$id_user'");

        // jika sudah terdapat data pada search maka akan diambil data dari searchnya
        // data get_tantangan diisi dengan data yang di search
        if (!empty($search)) {
            $search = mysqli_real_escape_string($conn, $search);
            $get_tantangan = mysqli_query($conn, "SELECT id_tantangan, judul_tantangan, isi_tantangan, tanggal_pengingat, waktu_pengingat 
                FROM tantangan WHERE id_pembuat = '$id_user' AND (judul_tantangan LIKE '%$search%' OR isi_tantangan LIKE '%$search%' OR tanggal_pengingat LIKE '%$search%')");
        }

        // jika data yang dicari ada maka setiap data ditampilkan dengan diloop
        if (mysqli_num_rows($get_tantangan)) {
            $data_tantangan = mysqli_fetch_all($get_tantangan, MYSQLI_ASSOC);
            foreach ($data_tantangan as $data) {
        ?>
        <!-- template looping html -->
                <div class="tampil-tugas pb-5">
                    <div class="d-flex justify-content-between">
                        <div class="judul-tantangan">
                            <h4><b><?= $data['judul_tantangan']; ?></h4></b>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </button>

                            <ul class="dropdown-menu">
                                <li>
                                    <form action="../config/tantangan/hapus_tantangan.php" method="POST">
                                        <input type="hidden" name="id_tantangan" value="<?= $data['id_tantangan'] ?>">
                                        <button type="submit" class="btn dropdown-item hapus-tantangan">
                                            <i class="fas fa-edit bi bi-trash"></i>Hapus Tantangan
                                        </button>
                                    </form>                                    
                                </li>

                                <li><button class="btn dropdown-item edit-tantangan"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal_edit_tantangan"
                                        data-id-tantangan="<?= $data['id_tantangan'] ?>"
                                        data-judul-tantangan="<?= $data['judul_tantangan'] ?>"
                                        data-tanggal-pengingat="<?= $data['tanggal_pengingat'] ?>"
                                        data-waktu-pengingat="<?= $data['waktu_pengingat'] ?>"
                                        data-isi-tantangan="<?= $data['isi_tantangan'] ?>">
                                        <i class="fas fas-edit bi bi-pencil"></i> Edit Tantangan
                                    </button></li>
                                <li><a href="detail_tantangan.php?id_tantangan=<?= $data['id_tantangan'] ?>" class="dropdown-item bi bi-card-checklist">Detail Tantangan</a></li>

                            </ul>
                        </div>
                    </div>
                    <div>
                        <?php
                        $get_pengikut = mysqli_query($conn, "SELECT COUNT(id_user) as jumlah FROM tantangan_stat WHERE id_tantangan = {$data['id_tantangan']}");
                        $pengikut = mysqli_fetch_assoc($get_pengikut)['jumlah'];
                        echo "Mengikuti: <b class='text-success'>$pengikut</b>";
                        ?>
                    </div>
                    <div class="id-tantangan">Kode tantangan : <?= $data['id_tantangan']; ?></div>
                    <div class="tanggal-tantangan"><i><?= $data['tanggal_pengingat']; ?> <?= $data['waktu_pengingat']; ?></i> </div>
                    <div class="isi-tantangan"><?= $data['isi_tantangan']; ?> </div>
                </div>
        <?php
            }
        } else {

            // jika belum ada tantangan yang dibuat maka akan ditampilkan belum ada tantangan dibuat
            echo "Belum ada tantangan dibuat :)";
        }
        ?>
</div>


    <!-- jika rolenya murid maka data akan diambil dari tabel tantangan_stat 
    untuk mengambil data tantangan yang diikuti -->
<?php elseif ($role === 'murid'): ?>


    <?php
        // mengambil data tantangan untuk ditampilkan ke halaman dengan menggunakan tabel tantangan_stat
        // lalu dilakukan inner join ke tantangan dengan nilai dari kolum id_tantangan yang sama
        // lalu dilakukan inner join ke users dengan nilai dari kolum id_user yang sama

        $get_tantangan = mysqli_query($conn, 
    "SELECT tantangan.id_tantangan AS id_tantangan, 
    tantangan.judul_tantangan AS judul_tantangan, 
    tantangan.isi_tantangan AS isi_tantangan, 
    tantangan.tanggal_pengingat AS tanggal_pengingat, 
    tantangan.waktu_pengingat AS waktu_pengingat, 
    users.username AS pembuat 
    FROM tantangan_stat INNER JOIN tantangan ON tantangan_stat.id_tantangan = tantangan.id_tantangan 
    INNER JOIN users ON tantangan.id_pembuat = users.id
    WHERE id_user = $id_user");


        // jika searchnya tidak kosong maka data get tantangan akan diambil berdasarkan pencariannya
        if (!empty($search)) {
            $search = mysqli_real_escape_string($conn, $search);
            $get_tantangan = mysqli_query($conn, "SELECT tantangan.id_tantangan AS id_tantangan, 
        tantangan.judul_tantangan AS judul_tantangan, 
        tantangan.isi_tantangan AS isi_tantangan, 
        tantangan.tanggal_pengingat AS tanggal_pengingat, 
        tantangan.waktu_pengingat AS waktu_pengingat, 
        users.username AS pembuat 
        FROM tantangan_stat INNER JOIN tantangan ON tantangan_stat.id_tantangan = tantangan.id_tantangan 
        INNER JOIN users ON tantangan.id_pembuat = users.id
        WHERE id_user = $id_user AND (judul_tantangan LIKE '%$search%' OR isi_tantangan LIKE '%$search%' OR tanggal_pengingat LIKE '%$search%')");
        }

        // melakukan looping jika terdapat data yang diambil
        if (mysqli_num_rows($get_tantangan)) {
            $data_tantangan = mysqli_fetch_all($get_tantangan, MYSQLI_ASSOC);
            foreach ($data_tantangan as $data) {
    ?>
            <!-- template html untuk looping nya -->
            <div class="tampil-tugas">
                <div class="judul-tantangan d-flex justify-content-between">
                    <h3><b><?= $data['judul_tantangan']; ?></b></h3>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </button>

                        <ul class="dropdown-menu">
                            <!-- tombol aksi -->
                            <li>
                                <form action="../config/tantangan/hapus_tantangan.php" method="POST">
                                    <input type="hidden" name="id_tantangan" value="<?= $data['id_tantangan']?>">

                                    <button type="submit" class="btn dropdown-item">
                                        <i class="fas fa-edit bi bi-trash"></i>Hapus Tantangan
                                    </button>
                                </form>    
                            <li><a href="../config/tantangan/tandai_selesai.php?id_tantangan=<?= $data['id_tantangan'] ?>" class="dropdown-item bi bi-check2">Tandai Sudah Selesai</a></li>
                            <li><a href="#" class="dropdown-item bi bi-bookmark-check" data-bs-toggle="modal" data-bs-target="#modalPengumpulan" onclick="setIdTantangan(<?php echo $data['id_tantangan']; ?>)">Pengumpulan</a></li>
                        </ul>

                    </div>
                </div>
                <div class="status-tantangan">
                    <?php
                    $get_stat = mysqli_query($conn, "SELECT * FROM tantangan_stat WHERE id_tantangan = '{$data['id_tantangan']}' AND id_user = '$id_user'");
                    $stat = mysqli_fetch_assoc($get_stat);
                    
                    // jika tantangan_stat bernilai false maka akan muncul belum selesai
                    // jika tantagnan_stat bernilai selain 0 maka akan muncul selesai
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

                <!-- jika nilai sudah tidak null maka akan muncul nilai -->
                <?php if (!empty($stat['nilai'])): ?>
                    <!-- jika nilai <= 50 maka akan ditampilkan dengan warna merah
                    jika nilai > 50 maka akan ditampilkan dengan warna hijau  -->
                    <div>Nilai : <b class="<?php echo ($stat['nilai'] <= 50) ? 'text-danger' : 'text-success'; ?>">
                            <?= $stat['nilai'] ?>
                        </b></div>
                <?php else: ?>
                    <div>Belum Dinilai</div>

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
        // jika belum ada tantangan diikuti maka akan muncul keteranagan belum mengeikuti tantangan
        } else {
            echo "Belum ada tantangan diikuti :)";
        }
    ?>

<?php endif; ?>

</div>

<?php
include "../asset/component/footer.php";
?>
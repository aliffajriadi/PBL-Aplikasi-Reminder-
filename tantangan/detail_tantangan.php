<?php
include "../asset/component/sidebar.php";
$id_tantangan = $_GET['id_tantangan'];

?>

<div class="isi_tugas">
    <div class="d-flex justify-content-between content-title">
        <h2 class=""><b>Detail Tantangan</b></h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="<?= $role === "guru" ? "#modal_tantangan_guru" : "#modal_tantangan_murid" ?>">
            Tambah tantangan
        </button>
    </div>

    <?php if ($role === 'guru'): ?>
        <?php
        $get_detail = mysqli_query($conn, "SELECT id_user, status_tantangan, keterangan, bukti, nilai FROM tantangan_stat WHERE id_tantangan = '$id_tantangan'");
        if (mysqli_num_rows($get_detail)) {
            $data_jadwal = mysqli_fetch_all($get_detail, MYSQLI_ASSOC);
            foreach ($data_jadwal as $data) {
        ?>

                <div class="tampil-tugas pb-5">
                    <div class="d-flex justify-content-between">
                        <div class="judul-tantangan">
                            <h4><b>
                                    <?php
                                    $get_nama = mysqli_query($conn, "SELECT username FROM users WHERE id = '{$data['id_user']}'");
                                    $nama = mysqli_fetch_assoc($get_nama);
                                    echo ucfirst($nama['username']);
                                    ?>
                            </h4></b>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </button>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"
                                        class="dropdown-item edit-data-btn bi bi-pencil"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editDataModal"
                                        data-id-user="<?= $data['id_user'] ?>"
                                        data-id-tantangan="<?= $id_tantangan ?>">
                                        Tambah Nilai
                                    </a>
                                </li>

                                <li>
                                    <a href="../config/tantangan/hapus_dari.php?id_tantangan=<?= $id_tantangan ?>&id_user=<?= $data['id_user'] ?>"
                                        class="dropdown-item bi bi-trash">
                                        Hapus Dari <?= ucfirst($nama['username']) ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex">Status Tantangan : <div class="fw-bold <?php echo $data['status_tantangan'] != 1 ? 'text-danger' : 'text-success' ?>">
                            <?php if ($data['status_tantangan'] != 1) {
                                echo " Belum Selesai";
                            } else {
                                echo " Selesai";
                            }
                            ?>
                        </div>
                    </div>
                    <div>
                        Grade : <b><?= $data['nilai'] ?></b>
                    </div>

                    <div class="tanggal-tantangan">
                        <hr>
                        <h6>Hasil Tantangan</h6>
                        <i>
                            <?= $data['keterangan']; ?>
                        </i>
                    </div>
                    <div class="isi-tantangan">
                        <?php
                        $filePath = $data['bukti'];

                        if (!empty($filePath) && file_exists($filePath)) {
                            echo '<a href="' . htmlspecialchars($filePath) . '" download>Download Bukti</a>';
                        } else {
                            echo 'File tidak ditemukan.';
                        }
                        ?>
                    </div>

                </div>
        <?php
            }
        } else {
            echo "Belum ada tantangan dibuat :)";
        }
        ?>
</div>


<?php endif; ?>

</div>



<?php
include "../asset/component/footer.php";
?>
<?php
include "../asset/component/sidebar.php";
?>

<!-- isi dari konten halaman catatan -->
<div class="isi_catatan">
    <div class="d-flex justify-content-between content-title">
        <h2><b>Halaman Catatan</b></h2>
        
        <!-- form untuk melakukan pencarian -->
        <form action="" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Cari catatan..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_catatan">
            Tambah Catatan
        </button>
    </div>

    <?php
    // variabel text untuk search
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    // jika search terdapat teks pada search querynya maka akan dicari 
    // berdasarkan dari teksnya
    // jika search kosong maka data yang diambil adalah data semua catatannya
    if ($searchQuery != '') {
        $get_catatan = mysqli_query($conn, "SELECT id_catatan, judul_catatan, isi_catatan FROM catatan WHERE id_user = '$id_user' AND (judul_catatan LIKE '%$searchQuery%' OR isi_catatan LIKE '%$searchQuery%')");
    } else {
        $get_catatan = mysqli_query($conn, "SELECT id_catatan, judul_catatan, isi_catatan FROM catatan WHERE id_user = '$id_user'");
    }

    // jika terdapat data maka data akan dilooping
    if (mysqli_num_rows($get_catatan)) {
        $data_catatan = mysqli_fetch_all($get_catatan, MYSQLI_ASSOC);

        foreach ($data_catatan as $data) {
    ?>
        <!-- template untuk menampilkan data catatan -->
            <div class="tampil-catatan pb-5">
                <div class="judul-catatan d-flex justify-content-between">
                    <?= $data['judul_catatan'] ?>
                    <div>

                        <div class="dropdown">
        
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </button>

                            
                            <ul class="dropdown-menu">

                                <li>
                                    <form action="../config/catatan/hapus_catatan.php" method="POST">
                                        <input type="hidden" name="id_catatan" value="<?= $data["id_catatan"] ?>">
                                        <button type="submit" class="btn dropdown-item hapus-catatan">
                                            <i class="fas fa-edit bi bi-trash"></i>Hapus Catatan
                                        </button>
                                    </form>
                                </li>

                                <li>
                                    <button class="btn dropdown-item edit-catatan"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal_edit_catatan"
                                        data-id-catatan="<?= $data['id_catatan'] ?>"
                                        data-judul-catatan="<?= $data['judul_catatan'] ?>"
                                        data-isi-catatan="<?= $data['isi_catatan'] ?>">
                                        <i class="fas fa-edit bi bi-pencil"></i> Edit Catatan
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="isi-catatan"><?= $data['isi_catatan'] ?></div>
            </div>
    <?php
        }
    } else {
        // jika tidak ada catatan ditemukan maka akan ada keterangan belum dibuat
        // atau tidak ditemukan 
        echo "Catatan Belum Dibuat atau Tidak Ditemukan";
    }
    ?>

</div>


</div>

<?php
include "../asset/component/footer.php";
?>
<?php
include "../asset/component/sidebar.php";

$id_user = $_SESSION['id_user'];
$foto_profil = $_SESSION['foto_profil'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id_user'");
$user = mysqli_fetch_assoc($result);
?>
<div class="d-flex justify-content-between content-title">
        <h2 class=""><b>Profil Saya</b></h2>
    </div>

<div class="d-flex justify-content-center m-5">
    <div class="card border p-4 rounded shadow-sm w-100">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <?php
                $foto_profil = !empty($user['foto_profil']) ? $user['foto_profil'] : 'default.png';
                ?>
                <img src="../uploads/profiles/<?php echo $foto_profil; ?>" alt="Foto Profil" class="rounded-circle mb-3" width="150" height="150">
                <h5 class="mb-2"><?php echo ucfirst($user['username']); ?></h5>
            </div>

            <div class="col-md-8">
                <h6 class="mb-3"><strong>Nama :</strong> <?php echo $user['username']; ?></h6>
                <h6 class="mb-3"><strong>Email :</strong> <?php echo $user['email']; ?></h6>
                <h6 class="mb-3"><strong>No. Telp :</strong> <?php echo $user['telp']; ?></h6>
                <h6 class="mb-3"><strong>Tipe Akun :</strong> <?php echo ($user['is_guru'] == 1) ? 'Guru' : 'Murid'; ?></h6>

                <div class="d-flex justify-content-start mb-3">
                    <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal_edit_profil">
                        <i class="bi bi-pencil-square"></i> Edit Profil
                    </button>
                    <a href="../config/user/logout.php" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- edit profil -->
    <div class="modal fade" id="modal_edit_profil" tabindex="-1" aria-labelledby="modal_edit_profil_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit_profil_label">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../config/profile/update_profile.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $nama_user ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Telp</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $telp?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto_profil" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="foto_profil" name="foto_profil" value="<?= $foto_profil?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru (kosongkan jika tidak ingin mengubah)">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password baru">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "../asset/component/footer.php";
    ?>
<?php
include '../config/koneksi.php';
include '../config/session.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Halaman <?php echo ucfirst($nama_user) ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/sidebar.css">
    <link rel="stylesheet" href="../asset/css/dashboard.css">
</head>

<body>

    <?php
    include '../config/koneksi.php';
    ?>

    <div class="wrapper">

        <section class="sidebar">

            <div class="profile-container">
                <div class="profile">
                    <img src="../asset/image/temporary-profile-placeholder-1.jpg" alt="" class="profile-pic">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo ucfirst($nama_user);?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit Profil (DEMO)</a></li>
                            <li><a class="dropdown-item" href="#">Keluar / Log out (DEMO)</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr>

            <ul>
                <li class="flex-start li-fitur" data-bs-toggle="modal" data-bs-target="#modal_catatan"><img
                        src="../asset/image/square-list-svgrepo-com.svg" alt="icon" class="icon">
                    <div class="fitur">Catatan</div>
                </li>
                <li class="flex-start li-fitur" data-bs-toggle="modal" data-bs-target="#modal_jadwal"><img
                        src="../asset/image/table-alt-svgrepo-com.svg" alt="icon" class="icon">
                    <div class="fitur">Jadwal</div>
                </li>
                <li class="flex-start li-fitur" data-bs-toggle="modal" data-bs-target="#modal_tugas"><img
                        src="../asset/image/clock-svgrepo-com.svg" alt="icon" class="icon">
                    <div class="fitur">Tugas</div>
                </li>
                <li class="flex-start li-fitur" data-bs-toggle="modal" data-bs-target="#modal_tantangan"><img
                        src="../asset/image/hexagon-svgrepo-com.svg" alt="icon" class="icon">
                    <div class="fitur">Tantangan</div>
                </li>
            </ul>

            <hr>

            <div class="setting-container flex-start">
                <hr>

                <div class="flex-start setting">
                    <img src="../asset/image/hexagon-svgrepo-com.svg" alt="icon" class="icon">
                    <div class="fitur">Pengaturan</div>
                </div>

                <hr>
            </div>

        </section>


        <section class="konten">
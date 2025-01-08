<?php
include '../config/koneksi.php';
include '../config/session.php';

$role = $_SESSION['role'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Halaman | <?php echo ucfirst($nama_user); ?>
    </title>
    <link rel="stylesheet" href="../asset/css/sidebar.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../asset/css/dashboard.css">
</head>

<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidebar-2 col-auto col-md-4 col-xl-2 px-sm-2 px-0" style="
            height: 100vh !important;
            position: sticky !important;
            top: 0 !important;
            z-index: 100 !important;
            background-color: #f9f9f9;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                    <span class="fs-3 d-none d-sm-inline"><b>Lifetivity <hr></b></span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="../dashboard" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-speedometer2"></i> <span class="ms-1 fw-bold d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../catatan" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-journal"></i> <span class="ms-1 d-none fw-bold d-sm-inline">Catatan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../tugas" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-list-task"></i> <span class="ms-1 d-none fw-bold d-sm-inline">Tugas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../jadwal" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-calendar2-week"></i> <span class="ms-1 d-none fw-bold d-sm-inline">Jadwal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../tantangan" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-hexagon"></i> <span class="ms-1 d-none d-sm-inline fw-bold">Tantangan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../riwayat" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-bookmark-check"></i> <span class="ms-1 d-none d-sm-inline fw-bold">Riwayat
                            </span>
                        </a>
                    </li>

                    <div class="div"></div>

                </ul>
                <hr>
                <?php
                $get_fotoprofil = mysqli_query($conn, "SELECT foto_profil FROM users WHERE id = $id_user");
                $data_fotoprofil = mysqli_fetch_assoc($get_fotoprofil);
                ?>
                
                <div class="dropdown pb-4">
                    <hr>
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../uploads/profiles/<?php echo $data_fotoprofil['foto_profil'];?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none text-black d-sm-inline mx-1 dropdown-toggle">
                            <?= ucfirst($nama_user);?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="../profile">Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item bi bi-box-arrow-in-left" href="../config/user/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
    
  
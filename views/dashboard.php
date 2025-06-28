<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
 <style>
        .card:hover {
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
            transform: translateY(-5px);
            transition: all .3s ease-in-out;
        }
    </style>
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php?page=dashboard">Inventaris</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white me-3">👋 <?= $_SESSION['user']['username']; ?></span>
            <a href="index.php?page=logout" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<!-- Konten Utama -->
<div class="container mt-5">
    <h3 class="mb-4">Dashboard</h3>
    <p class="lead">Silakan pilih salah satu fitur berikut:</p>

    <div class="row g-4">

        <!-- Manajemen Barang -->
        <div class="col-md-3 col-sm-6">
            <a href="index.php?page=barang" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">📦 Barang</h5>
                        <p class="card-text">Kelola data barang seperti tambah, ubah, dan hapus.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Peminjaman Barang -->
        <div class="col-md-3 col-sm-6">
            <a href="index.php?page=peminjaman" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">📋 Peminjaman</h5>
                        <p class="card-text">Catat peminjaman barang oleh petugas atau pegawai.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pengembalian Barang -->
        <div class="col-md-3 col-sm-6">
            <a href="index.php?page=pengembalian" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">🔁 Pengembalian</h5>
                        <p class="card-text">Tandai barang yang sudah dikembalikan oleh peminjam.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Laporan -->
        <div class="col-md-3 col-sm-6">
            <a href="index.php?page=laporan" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">📑 Laporan</h5>
                        <p class="card-text">Lihat riwayat peminjaman & pengembalian barang.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="text-center text-muted py-4 mt-5 small">
    &copy; <?= date('Y') ?> Sistem Informasi Inventaris. All rights reserved.
</footer>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
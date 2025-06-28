<?php
require_once 'config/db.php';
$result = $conn->query("SELECT * FROM barang");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h4>Data Barang</h4>
        <a href="index.php?page=barang-tambah" class="btn btn-success mb-3">+ Tambah Barang</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th><th>Nama</th><th>Kode</th><th>Jumlah</th><th>Kondisi</th><th>Lokasi</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_barang'] ?></td>
                    <td><?= $row['kode_barang'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['kondisi'] ?></td>
                    <td><?= $row['lokasi'] ?></td>
                    <td>
                        <a href="index.php?page=barang-edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?page=barang-hapus&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
            <div class="mt-4">
                <a href="index.php?page=dashboard" class="btn btn-secondary">⬅️ Kembali ke Dashboard</a>
            </div>
    </div>

    <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

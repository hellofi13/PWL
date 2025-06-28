<?php
require 'config/db.php';
$result = $conn->query("SELECT p.*, b.nama_barang FROM peminjaman p JOIN barang b ON p.id_barang = b.id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h4>Data Peminjaman Barang</h4>
    <a href="index.php?page=peminjaman-tambah" class="btn btn-success mb-3">+ Tambah</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th><th>Nama Peminjam</th><th>Barang</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Keterangan</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_peminjam'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['tgl_pinjam'] ?></td>
                <td><?= $row['tgl_kembali'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td>
                    <a href="index.php?page=peminjaman-hapus&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
        <div class="mt-4">
            <a href="index.php?page=dashboard" class="btn btn-secondary">⬅️ Kembali ke Dashboard</a>
        </div>
</div>
</body>
</html>

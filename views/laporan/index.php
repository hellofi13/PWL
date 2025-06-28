<?php
require 'config/db.php';
$query = "SELECT p.*, b.nama_barang FROM peminjaman p
          JOIN barang b ON p.id_barang = b.id
          ORDER BY p.tgl_pinjam DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h4>Laporan Peminjaman Barang</h4>
    <p class="text-muted">Berikut adalah riwayat peminjaman dan pengembalian barang:</p>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Nama Barang</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali (Rencana)</th>
                <th>Tgl Dikembalikan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_peminjam'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['tgl_pinjam'] ?></td>
                <td><?= $row['tgl_kembali'] ?></td>
                <td><?= $row['tgl_dikembalikan'] ?? '-' ?></td>
                <td>
                    <?php if ($row['tgl_dikembalikan']): ?>
                        <span class="badge bg-success">Sudah Dikembalikan</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Belum Dikembalikan</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>
</body>
</html>

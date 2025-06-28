<?php
require 'config/db.php';
$result = $conn->query("SELECT p.*, b.nama_barang FROM peminjaman p JOIN barang b ON p.id_barang = b.id WHERE tgl_dikembalikan IS NULL");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h4>Barang Belum Dikembalikan</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th><th>Nama Peminjam</th><th>Barang</th><th>Tgl Pinjam</th><th>Tgl Kembali (Rencana)</th><th>Aksi</th>
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
                <td>
                    <a href="index.php?page=pengembalian-kembalikan&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Kembalikan</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>
</body>
</html>

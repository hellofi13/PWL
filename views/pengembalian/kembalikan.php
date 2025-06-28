<?php
require 'config/db.php';
$id = $_GET['id'] ?? 0;

// Proses update ketika dikembalikan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tgl = date('Y-m-d');
    $conn->query("UPDATE peminjaman SET tgl_dikembalikan = '$tgl' WHERE id = $id");
    header("Location: index.php?page=pengembalian");
    exit;
}

$data = $conn->query("SELECT p.*, b.nama_barang FROM peminjaman p JOIN barang b ON p.id_barang = b.id WHERE p.id = $id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pengembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h4>Konfirmasi Pengembalian Barang</h4>
    <div class="mb-3">
        <strong>Nama Peminjam:</strong> <?= $data['nama_peminjam'] ?><br>
        <strong>Nama Barang:</strong> <?= $data['nama_barang'] ?><br>
        <strong>Tanggal Pinjam:</strong> <?= $data['tgl_pinjam'] ?><br>
    </div>
    <form method="post">
        <p>Apakah barang sudah dikembalikan hari ini (<strong><?= date('d-m-Y') ?></strong>)?</p>
        <button class="btn btn-success">Ya, Sudah Dikembalikan</button>
        <a href="index.php?page=pengembalian" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

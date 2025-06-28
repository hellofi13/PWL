<?php
require 'config/db.php';
$id = $_GET['id'] ?? 0;

// Ambil data barang
$data = $conn->query("SELECT * FROM barang WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE barang SET nama_barang=?, kode_barang=?, jumlah=?, kondisi=?, lokasi=? WHERE id=?");
    $stmt->bind_param("ssissi", $_POST['nama'], $_POST['kode'], $_POST['jumlah'], $_POST['kondisi'], $_POST['lokasi'], $id);
    $stmt->execute();
    header("Location: index.php?page=barang");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h4>Edit Barang</h4>
    <form method="post">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama_barang'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode" class="form-control" value="<?= $data['kode_barang'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Kondisi</label>
            <select name="kondisi" class="form-control" required>
                <option <?= $data['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
                <option <?= $data['kondisi'] == 'Rusak' ? 'selected' : '' ?>>Rusak</option>
                <option <?= $data['kondisi'] == 'Hilang' ? 'selected' : '' ?>>Hilang</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="<?= $data['lokasi'] ?>" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="index.php?page=barang" class="btn btn-secondary">Kembali</a>
    </form>
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
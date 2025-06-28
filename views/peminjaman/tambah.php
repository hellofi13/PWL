<?php
require 'config/db.php';
$barang = $conn->query("SELECT id, nama_barang FROM barang");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("INSERT INTO peminjaman (id_barang, nama_peminjam, tgl_pinjam, tgl_kembali, keterangan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $_POST['barang_id'], $_POST['nama_peminjam'], $_POST['tgl_pinjam'], $_POST['tgl_kembali'], $_POST['keterangan']);
    $stmt->execute();
    header("Location: index.php?page=peminjaman");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h4>Tambah Data Peminjaman</h4>
    <form method="post">
        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Barang</label>
            <select name="barang_id" class="form-control" required>
                <?php while($b = $barang->fetch_assoc()): ?>
                <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="index.php?page=peminjaman" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>

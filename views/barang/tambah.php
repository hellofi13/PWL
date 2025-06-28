<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'config/db.php';
    $stmt = $conn->prepare("INSERT INTO barang (nama_barang, kode_barang, jumlah, kondisi, lokasi) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $_POST['nama'], $_POST['kode'], $_POST['jumlah'], $_POST['kondisi'], $_POST['lokasi']);
    $stmt->execute();
    header("Location: index.php?page=barang");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h4>Tambah Barang</h4>
    <form method="post">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kondisi</label>
            <select name="kondisi" class="form-control" required>
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
                <option value="Hilang">Hilang</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="index.php?page=barang" class="btn btn-secondary">Kembali</a>
    </form>
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
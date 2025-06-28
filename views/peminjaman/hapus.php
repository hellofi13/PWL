<?php
require 'config/db.php';
$id = $_GET['id'] ?? 0;
$conn->query("DELETE FROM peminjaman WHERE id = $id");
header("Location: index.php?page=peminjaman");
?>

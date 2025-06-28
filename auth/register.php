<?php
require_once '../config/db.php';
$username = $_POST['username'];
$password = $_POST['password'];
$role = 'petugas';
//validasi agar tidak kosong pada saat proses login
if (empty($username) || empty($password)) {
    $errors[] = "Username dan password tidak boleh kosong.";
}
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $errors[] = "Username sudah digunakan.";
}

if (empty($errors)) {
    header("Location: ../index.php?page=login&success=register");
} else {
    header("Location: ../index.php?page=register&error=Username sudah digunakan");
}
?>
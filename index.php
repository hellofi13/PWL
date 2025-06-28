<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$page = isset($_GET['page']) ? $_GET['page'] : 'login';
switch ($page) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'auth/login.php';
        } else {
            include 'views/login.php';
        }
        break;
    case 'register':
        include 'views/register.php';
        break;
    case 'dashboard':
        include 'views/dashboard.php';
        break;
     case 'barang':
        include 'views/barang/index.php';
        break;
    case 'barang-tambah':
         include 'views/barang/tambah.php';
        break;
    case 'barang-edit': 
        include 'views/barang/edit.php'; 
        break;
    case 'barang-hapus': 
        include 'views/barang/hapus.php'; 
        break;
    case 'peminjaman':
        include 'views/peminjaman/index.php';
        break;
    case 'peminjaman-tambah':
        include 'views/peminjaman/tambah.php';
        break;
    case 'peminjaman-hapus':
        include 'views/peminjaman/hapus.php';
        break;
    case 'pengembalian':
        include 'views/pengembalian/index.php';
        break;
    case 'pengembalian-kembalikan':
        include 'views/pengembalian/kembalikan.php';
        break;
    case 'laporan':
        include 'views/laporan/index.php';
        break;
    case 'logout':
        include 'auth/logout.php';
        break;
    default:
        echo "404 - Halaman tidak ditemukan";
        break;
}
?>
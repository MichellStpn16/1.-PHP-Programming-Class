/controllers
├── BarangController.php
├── LaporanController.php
├── UserController.php

<?php
include_once "../config/database.php";
include_once "../models/Barang.php";

$database = new Database();
$db = $database->getConnection();
$barang = new Barang($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $barang->tambahBarang($_POST['nama'], $_POST['harga'], $_POST['stok']);
    } elseif (isset($_POST['update'])) {
        $barang->updateBarang($_POST['id'], $_POST['nama'], $_POST['harga'], $_POST['stok']);
    } elseif (isset($_POST['delete'])) {
        $barang->deleteBarang($_POST['id']);
    }
}

header("Location: ../views/barang.php");
?>

<?php
include_once "../config/database.php";
include_once "../models/User.php";

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $user->registerUser($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['delete'])) {
        $user->deleteUser($_POST['id']);
    }
}

header("Location: ../views/user.php");
?>

<?php
include_once "../config/database.php";
include_once "../models/Laporan.php";

$database = new Database();
$db = $database->getConnection();
$laporan = new Laporan($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hitung_rugi_laba'])) {
        $laporan->hitungRugiLaba();
    }
}

header("Location: ../views/laporan.php");
?>

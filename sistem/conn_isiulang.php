<?php
include '../koneksi/koneksi.php';

$status = $_POST['status'];
$id = $_POST['id'];

$query = "UPDATE inventory SET status = '$status' WHERE id = '$id'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/produksi/dataproduksi.php?pesan=allow');
} else {
    header('location:../interface/produksi/dataproduksi.php?pesan=deny');
}

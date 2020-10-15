<?php
include '../koneksi/koneksi.php';

$nama = $_POST['nama'];
$kuantitas = $_POST['kuantitas'];
$harga = $_POST['harga'];

$query = "UPDATE produk SET kuantitas = '$kuantitas',harga = '$harga' WHERE nama = '$nama'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/sales/halaman_sales.php?pesan=allow');
} else {
    header('location:../interface/sales/halaman_sales.php?pesan=deny');
}

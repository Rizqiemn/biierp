<?php

include '../koneksi/koneksi.php';

$tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$prod = $_POST['prod'];
$jumlah = $_POST['jumlah'];
$pembayaran = $_POST['jumlah'] * $_POST['harga'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$status = $_POST['status'];

$query = "INSERT INTO ordercustomer (tanggal, nama, prod, jumlah, pembayaran, alamat, kontak, status)
VALUES('$tanggal','$nama','$prod','$jumlah','$pembayaran','$alamat', '$kontak', '$status');";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/customer/halaman_customer.php?pesan=allow');
} else {
    header('location:../interface/customer/halaman_customer.php?pesan=deny');
}

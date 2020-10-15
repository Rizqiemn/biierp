<?php
include '../koneksi/koneksi.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];
$jenis_vendor = $_POST['jenis_vendor'];

$query = "insert into supplier SET nama = '$nama',kontak = '$kontak',
alamat = '$alamat', jenis_vendor = '$jenis_vendor', kode = '$kode'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/purchasing/supplier.php?pesan=allow3');
} else {
    header('location:../interface/purchasing/supplier.php?pesan=deny');
}

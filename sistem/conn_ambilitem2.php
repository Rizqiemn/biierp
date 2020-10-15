<?php
include '../koneksi/koneksi.php';

$kode = $_POST['kode'];
$id_order = $_POST['id_order'];
$jumlah = $_POST['jumlah'];

$query = "insert into ambilmaterial SET id_order = '$id_order',item = '$kode',
jumlah = '$jumlah'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/produksi/dataproduksi.php?pesan=allow');
} else {
    header('location:../interface/produksi/dataproduksi.php?pesan=deny');
}

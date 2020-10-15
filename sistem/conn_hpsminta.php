<?php
include '../koneksi/koneksi.php';

$id_ambil = $_POST['id_ambil'];

$query = "DELETE from ambilmaterial where id_ambil = '$id_ambil'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/produksi/dataproduksi.php?pesan=allow');
} else {
    header('location:../interface/produksi/dataproduksi.php?pesan=deny');
}

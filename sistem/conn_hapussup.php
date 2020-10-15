<?php
include '../koneksi/koneksi.php';

$kode = $_POST['kode'];

$query = "DELETE from supplier where kode = '$kode'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/purchasing/supplier.php?pesan=allow2');
} else {
    header('location:../interface/purchasing/supplier.php?pesan=deny');
}

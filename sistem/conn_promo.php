<?php
include '../koneksi/koneksi.php';

$nama = $_POST['nama'];
$deskipsi = $_POST['deskipsi'];

$query = "insert into promo SET nama = '$nama', deskipsi = '$deskipsi'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/sales/promosi.php?pesan=allow');
} else {
    header('location:../interface/sales/promosi.php?pesan=deny');
}

<?php
include '../koneksi/koneksi.php';

$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];

$sql = mysqli_query($koneksi, "SELECT * FROM inventory where nama = '$nama'");
if (mysqli_num_rows($sql) > 0) {
    while ($data5 = mysqli_fetch_array($sql)) {
        $a = $data5["jumlah"];
    }
}

$jumlah2 = $a + $jumlah;

$sql2 = mysqli_query($koneksi, "UPDATE inventory SET jumlah = '$jumlah2' where nama = '$nama'");


if (mysqli_query($koneksi, $sql2)) {
    header('location:../interface/finance/paymentreq.php?pesan=deny');
} else {
    header('location:../interface/finance/paymentreq.php?pesan=allow1');
}

<?php

include '../koneksi/koneksi.php';

$tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$totalcost = $_POST['totalcost'];
$deadline = $_POST['deadline'];
$supplier = $_POST['supplier'];
$status = $_POST['status'];

$query = "INSERT INTO purchase (tanggal, nama, jumlah, totalcost, deadline, supplier, status)
VALUES('$tanggal','$nama','$jumlah','$totalcost','$deadline','$supplier','$status');";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/purchasing/purchase_order.php?pesan=allow');
} else {
    header('location:../interface/purchasing/purchase_order.php?pesan=deny');
}

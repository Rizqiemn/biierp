<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE ordercustomer SET status = '$status' WHERE id = '$id'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/finance/konfirmasipembayaran.php?pesan=allow');
} else {
    header('location:../interface/finance/konfirmasipembayaran.php?pesan=deny');
}

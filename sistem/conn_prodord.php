<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];
$start = $_POST['start'];
$duedate = $_POST['duedate'];
$status = $_POST['status'];

$query = "UPDATE ordercustomer SET start = '$start', status = '$status', duedate = '$duedate' WHERE id = '$id'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/produksi/incomingord.php?pesan=allow');
} else {
    header('location:../interface/produksi/incomingord.php?pesan=deny');
}

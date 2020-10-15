<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE purchase SET status = '$status' WHERE id = '$id'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/finance/paymentreq.php?pesan=allow2');
} else {
    header('location:../interface/finance/paymentreq.php?pesan=deny');
}

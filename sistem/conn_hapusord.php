<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];

$query = "DELETE from ordercustomer where id = '$id'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/finance/konfirmasipembayaran.php?pesan=allow');
} else {
    header('location:../interface/finance/konfirmasipembayaran.php?pesan=deny');
}

<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];

$query = "DELETE from ordercustomer where id = '$id'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/customer/pemesanan.php?pesan=allow2');
} else {
    header('location:../interface/customer/pemesanan.php?pesan=deny');
}

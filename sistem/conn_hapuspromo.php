<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];

$query = "DELETE from promo where id = '$id'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/sales/promosi.php?pesan=allow4');
} else {
    header('location:../interface/sales/promosi.php?pesan=deny2');
}

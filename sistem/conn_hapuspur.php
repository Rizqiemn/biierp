<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];

$query = "DELETE from purchase where id = '$id'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/purchasing/purchase_order.php?pesan=allow2');
} else {
    header('location:../interface/purchasing/purchase_order.php?pesan=deny');
}

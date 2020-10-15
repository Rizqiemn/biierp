<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];
$gaji = $_POST['gaji'];


$query = "UPDATE user SET gaji = '$gaji' WHERE id = '$id'";


if (mysqli_query($koneksi, $query)) {
    header('location:../interface/finance/gaji.php?pesan=allow');
} else {
    header('location:../interface/finance/gaji.php?pesan=deny');
}

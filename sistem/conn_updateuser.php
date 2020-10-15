<?php
include '../koneksi/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$query = "UPDATE user SET nama='$nama', email='$email', phone='$phone', 
username='$username', password='$password', level='$level' WHERE id ='$id'";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/admin/userdata.php?pesan=allow2');
} else {
    header('location:../interface/admin/userdata.php?pesan=deny');
}

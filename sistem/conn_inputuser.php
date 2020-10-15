<?php

include '../koneksi/koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$query = "INSERT INTO user (nama,email,phone,username,password,level)
VALUES('$nama','$email','$phone','$username','$password','$level');";

if (mysqli_query($koneksi, $query)) {
    header('location:../interface/admin/userdata.php?pesan=allow');
} else {
    header('location:../interface/admin/userdata.php?pesan=deny');
}

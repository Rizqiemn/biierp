<?php 
$koneksi = mysqli_connect("localhost", "id15125051_bili", "y\$xK/oH%OtU>Mx4", "id15125051_bili_db");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
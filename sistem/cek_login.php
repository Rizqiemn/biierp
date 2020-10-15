<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi/koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['level'] == "admin") {

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../interface/admin/halaman_admin.php");

		// cek jika user login sebagai pegawai
	} else if ($data['level'] == "customer") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "customer";
		// alihkan ke halaman dashboard pegawai
		header("location:../interface/customer/halaman_customer.php");

		// cek jika user login sebagai pegawai
	} else if ($data['level'] == "sales") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "sales";
		// alihkan ke halaman dashboard pegawai
		header("location:../interface/sales/halaman_sales.php");

		// cek jika user login sebagai pengurus
	} else if ($data['level'] == "produksi") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "produksi";
		// alihkan ke halaman dashboard pengurus
		header("location:../interface/produksi/halaman_produksi.php");

		// cek jika user login sebagai pengurus
	} else if ($data['level'] == "purchasing") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "purchasing";
		// alihkan ke halaman dashboard pengurus
		header("location:../interface/purchasing/halaman_purchasing.php");

		// cek jika user login sebagai pengurus
	} else if ($data['level'] == "finance") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "finance";
		// alihkan ke halaman dashboard pengurus
		header("location:../interface/finance/halaman_finance.php");

		// cek jika user login sebagai pengurus
	} else if ($data['level'] == "CEO") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "CEO";
		// alihkan ke halaman dashboard pengurus
		header("location:../interface/ceo/halaman_ceo.php");
	} else {

		// alihkan ke halaman login kembali
		header("location:../interface/login.php?pesan=gagal");
	}
} else {
	header("location:../interface/login.php?pesan=gagal");
}

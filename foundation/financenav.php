</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BILI | Finance Page</title>
    <link href="../../dist/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<?php include "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM produk");
$query2 = mysqli_query($koneksi, "SELECT * FROM user");
$query3 = mysqli_query($koneksi, "SELECT * FROM promo");
$query6 = mysqli_query($koneksi, "
    SELECT ordercustomer.id, 
        ordercustomer.prod,
        inventory.nama, 
        ambilmaterial.id_order,
        ambilmaterial.item,
        ambilmaterial.id_ambil,
        ambilmaterial.jumlah
        from ordercustomer 
JOIN ambilmaterial ON ordercustomer.id = ambilmaterial.id_order
JOIN inventory ON ambilmaterial.item = inventory.kode
");
$result = mysqli_query($koneksi, "SELECT prod,sum(jumlah) AS demand FROM ordercustomer GROUP BY prod DESC");
$jmlord = mysqli_query($koneksi, "SELECT * FROM ordercustomer WHERE status = 'Belum Bayar'");
$ordacc = mysqli_query($koneksi, "SELECT * FROM ordercustomer WHERE status = 'Lunas'");
$ordend = mysqli_query($koneksi, "SELECT * FROM `ordercustomer` WHERE duedate != 0");
$gaji = mysqli_query($koneksi, "SELECT * FROM user WHERE level != 'customer'");
$gaji2 = mysqli_query($koneksi, "SELECT sum(gaji) AS total FROM user where level !='customer'");
$sql = mysqli_query($koneksi, "SELECT sum(pembayaran) AS total FROM ordercustomer where status='Lunas'");
$query = mysqli_query($koneksi, "SELECT * FROM purchase where status='submited to finance departement'");

?>

<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
}

?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <a class="navbar-brand" href="#">BILI.COM</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <h4 class="text-light"><?php echo $_SESSION['username']; ?></h4>
            </div>
        </form>
        <!-- Navbar-->
        <ul class=" navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../../interface/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"><?php echo $_SESSION['username']; ?></div>
                        <a class="nav-link" href="halaman_finance.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i>
                            </div>
                            Finance Menu
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="paymentreq.php">Payment Request</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="gaji.php">Gaji Pegawai</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="konfirmasipembayaran.php">Konfirmasi Pelunasan</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="monitoring.php">Monitoring Keuangan</a>
                            </nav>
                        </div>

                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Staff Data</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
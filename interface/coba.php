<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>BILI Catalog</title>
	<link href="../dist/css/styles.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<?php include "../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
		<a class="navbar-brand" href="index.html">BILI.COM</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
					<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="../interface/login.php">Login Here</a>
				</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<div class="sb-sidenav-menu-heading">Core</div>
						<a class="nav-link" href="#"><img src="../foundation/logo.jpg" width="180"></a>
					</div>
					<div class="sb-sidenav-footer">
						<div class="small">About</div>
						PT.BILI merupakan perusahaan yang bergerak di bidang bla bla
					</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Catalog</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Catalog Produk | Silahkan Logi Untuk Pemesanan</li>
					</ol>

					<div class="row">
						<div class="col-xl-6">
							<div class="card mb-4">
								<div class="card-header"><i class="fas fa-shopping-bag mr-1"></i>Produk Sikat Tipe Coklat</div>
								<div class="card-body"><img src="../foundation/310406.jpg" width="500"></canvas></div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card mb-4">
								<div class="card-header"><i class="fas fa-shopping-bag mr-1"></i>Produk Sikat Tipe Biru</div>
								<div class="card-body"><img src="../foundation/310406.jpg" width="500"></canvas></div>
							</div>
						</div>

					</div>
					<div class="card mb-4">
						<div class="card-header"><i class="fas fa-table mr-1"></i>Detail Produk</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Produk</th>
											<th>Nama Produk</th>
											<th>Harga</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Kode Produk</th>
											<th>Nama Produk</th>
											<th>Harga</th>
										</tr>
									</tfoot>
									<tbody>

										<?php if (mysqli_num_rows($query) > 0) { ?>
											<?php
											$no = 1;
											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo $no ?></td>
													<td><?php echo $data["kode"]; ?></td>
													<td><?php echo $data["nama"]; ?></td>
													<td><?php echo $data["harga"]; ?></td>
												</tr>
											<?php $no++;
											} ?>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2019</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="../dist/js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="../dist/assets/demo/chart-area-demo.js"></script>
	<script src="../dist/assets/demo/chart-bar-demo.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="../dist/assets/demo/datatables-demo.js"></script>
</body>

</html>
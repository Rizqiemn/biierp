<?php include "../../foundation/customernav.php" ?>
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Dashboard</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active"> <?php echo $_SESSION['username']; ?> | <?php echo $_SESSION['level']; ?> </li>

			</ol>
			<div class="row">
				<div class="col-xl-2 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-body">Pemesanan</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="pemesanan.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-md-6">
					<div class="card bg-info text-white mb-4">
						<div class="card-body">History </div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="histpemesanan.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">Promo!</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="promo.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header"><i class="fas fa-shopping-bag mr-1"></i>IFC Brush Coklat</div>
						<div class="card-body"><img src="../../foundation/310406.jpg" width="500"></canvas></div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header"><i class="fas fa-shopping-bag mr-1"></i>IFC Brush Biru</div>
						<div class="card-body"><img src="../../foundation/310406.jpg" width="500"></canvas></div>
					</div>
				</div>

			</div>
			<div class="card mb-4">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Detail Produk</div>
				<div class="card-body">
					<?php
					if (isset($_GET['pesan'])) {
						if ($_GET['pesan'] == "deny") {
							echo "<div class='breadcrumb mb-4'; 'bg-danger'>Maaf pesanan anda tidak terkirim, coba lagi</div>";
						}
					}
					?>
					<?php
					if (isset($_GET['pesan'])) {
						if ($_GET['pesan'] == "allow") {
							echo "<div class='breadcrumb mb-4'; 'bg-danger'>pesanan anda sudah masuk silahkan lakukan pembayaran 2 x 24 jam, jika lebih pesanan akan hangus</div>";
						}
					}
					?>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Produk</th>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Kode Produk</th>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Action</th>
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
											<td>
												<!-- Trigger the modal with a button -->
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data["kode"]; ?>"><span class="text">Pesan produk ini</span></button>

												<!-- Modal -->
												<div class="modal fade" id="myModal<?php echo $data["kode"]; ?>" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Form Pesan Produk</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<form class="user" method="post" action="../../sistem/conn_ordercustomer.php">

																<div class="modal-body">
																	<div class="form-group">
																		<input type="text" required="required" class="form-control form-control-user" disabled value="<?php echo $_SESSION['username']; ?>">
																		<input type="hidden" required="required" class="form-control form-control-user" name="nama" value="<?php echo $_SESSION['username']; ?>">
																	</div>
																	<div class="form-group">
																		<input type="text" required="required" class="form-control form-control-user" name="prod" value="<?php echo $data["nama"]; ?>">
																	</div>
																	<div class="form-group">
																		<input type="text" required="required" class="form-control form-control-user" name="jumlah" placeholder="Jumlah">
																		<input type="hidden" required="required" class="form-control form-control-user" name="harga" value="<?php echo $data["harga"]; ?>">
																	</div>
																	<div class="form-group">
																		<input type="text" required="required" class="form-control form-control-user" name="alamat" placeholder="Alamat yang dituju">
																	</div>
																	<div class="form-group">
																		<input type="text" required="required" class="form-control form-control-user" name="kontak" placeholder="Nomor yang dapat dihubungi">
																	</div>
																	<div class="form-group">
																		<input type="hidden" required="required" class="form-control form-control-user" name="status" value="Belum Bayar">
																		<input type="hidden" required="required" class="form-control form-control-user" name="tanggal" value="<?php echo date('d-m-yy') ?>">
																	</div>

																</div>
																<div class="modal-footer">
																	<button class="btn btn-secondary" type="button" data-dismiss="modal">cancel</button>
																	<input type="submit" class="btn btn-warning" value="Order Now!">
																</div>
															</form>
														</div>
													</div>
												</div>
											</td>
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
<script src="../../dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../../dist/assets/demo/chart-area-demo.js"></script>
<script src="../../dist/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../../dist/assets/demo/datatables-demo.js"></script>
</body>

</html>
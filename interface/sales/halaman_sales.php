<?php include "../../foundation/salesnav.php" ?>
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
						<div class="card-body">Incoming Order</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="incomingord.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-md-6">
					<div class="card bg-info text-white mb-4">
						<div class="card-body">Promosi</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="promosi.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">Report</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="report.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-body">
							<?php
							$count = mysqli_num_rows($jmlord);
							echo "Ada $count pesanan baru";
							?>
						</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="incomingord.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-info text-white mb-4">
						<div class="card-body">
							<?php
							$count2 = mysqli_num_rows($ordacc);
							echo "Ada $count2 pesanan terlayani";
							?></div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="report.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6">
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
									echo "<div class='breadcrumb mb-4'; 'bg-danger'>Data Berhasil Di Edit!</div>";
								}
							}
							?>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Kode Produk</th>
											<th>Nama Produk</th>
											<th>Harga</th>
											<th>Stok</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Kode Produk</th>
											<th>Nama Produk</th>
											<th>Harga</th>
											<th>Stok</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>

										<?php if (mysqli_num_rows($query) > 0) { ?>
											<?php

											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo $data["kode"]; ?></td>
													<td><?php echo $data["nama"]; ?></td>
													<td><?php echo $data["harga"]; ?></td>
													<td><?php echo $data["kuantitas"]; ?></td>
													<td>
														<!-- Trigger the modal with a button -->
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data["kode"]; ?>"><span class="text">Edit</span></button>

														<!-- Modal -->
														<div class="modal fade" id="myModal<?php echo $data["kode"]; ?>" role="dialog">
															<div class="modal-dialog">

																<!-- Modal content-->
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Form Update Produk</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<form class="user" method="post" action="../../sistem/conn_editprod.php">
																		<div class="modal-body">
																			<div class="form-group">
																				<label>Produk : <?php echo $data["nama"]; ?> </label>
																				<input type="hidden" required="required" class="form-control form-control-user" name="nama" value="<?php echo $data["nama"]; ?>">
																				<hr>
																			</div>
																			<div class="form-group">
																				<label>Jumlah Terkini</label>
																				<input type="text" required="required" class="form-control form-control-user" name="kuantitas" value="<?php echo $data["kuantitas"]; ?>">
																			</div>
																			<div class="form-group">
																				<label>Harga Terkini</label>
																				<input type="text" required="required" class="form-control form-control-user" name="harga" value="<?php echo $data["harga"]; ?>">
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button class="btn btn-secondary" type="button" data-dismiss="modal">cancel</button>
																			<input type="submit" class="btn btn-warning" value="Edit Data">
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</td>
												</tr>
											<?php
											} ?>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header"><i class="fas fa-shopping-bag mr-1"></i>Demand</div>
						<div class="card-body">
							<div id="piechart"></div>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Language', 'demand'],
			<?php
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "['" . $row['prod'] . "', " . $row['demand'] . "],";
				}
			}
			?>
		]);

		var options = {
			title: 'Persentase Permintaan Barang',
			width: 500,
			height: 300,
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}
</script>
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
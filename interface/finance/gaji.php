<?php include "../../foundation/financenav.php" ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Payroll</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"> <?php echo $_SESSION['username']; ?> | <?php echo $_SESSION['level']; ?> </li>

            </ol>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Order On-Going</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="ongoingord.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Inventory</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="inventory.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">Consumption</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="dataproduksi.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">Report</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="report.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
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
                        if ($_GET['pesan'] == "allow1") {
                            echo "<div class='breadcrumb mb-4 bg-info'>Stok sudah di Update silahkan klik sudah bayar</div>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "allow2") {
                            echo "<div class='breadcrumb mb-4 bg-success'>Pesanan Terselesaikan</div>";
                        }
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kontak</th>
                                    <th>Level</th>
                                    <th>Gaji</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kontak</th>
                                    <th>Level</th>
                                    <th>Gaji</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if (mysqli_num_rows($gaji) > 0) { ?>
                                    <?php
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($gaji)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["phone"]; ?></td>
                                            <td><?php echo $data["level"]; ?></td>
                                            <td><?php echo $data["gaji"]; ?></td>
                                            <td>
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data["id"]; ?>"><span class="text">Edit</span></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal<?php echo $data["id"]; ?>" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Form Edit Gaji</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <form class="user" method="post" action="../../sistem/conn_editgaji.php">

                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Gaji dari : <?php echo $data["nama"]; ?> adalah <?php echo $data["gaji"]; ?> ingin mengubahnya?</label>
                                                                        <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data["id"]; ?>">
                                                                        <input type="text" required="required" class="form-control form-control-user" name="gaji" value="<?php echo $data["gaji"]; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">cancel</button>
                                                                    <input type="submit" class="btn btn-warning" value="Simpan">
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
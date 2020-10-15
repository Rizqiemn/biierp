<?php
include "../../foundation/produksinav.php";
include "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM inventory");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Inventory Check</h1>
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
                        <div class="card-body">Order On-Going</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="ongoingord.php">View Details</a>
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
                <div class="card-header"><i class="fas fa-edit mr-1"></i>Form Minta Material</div>
                <div class="card-body">
                    <?php
                    if (isset($_POST['purchase'])) {
                        $kode = $_POST['kode'];
                        $query3 = mysqli_query($koneksi, "SELECT * FROM inventory where kode='$kode'");
                    } else {
                        $query3 = mysqli_query($koneksi, "SELECT * FROM inventory where id='1'");
                    }
                    ?>
                    <?php if (mysqli_num_rows($query3) > 0) { ?>
                        <?php
                        while ($data3 = mysqli_fetch_array($query3)) {
                        ?>
                            <form action="../../sistem/conn_ambilitem.php" method="post">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Material</label>
                                            <select class="form-control form-control-user" name="kode">
                                                <option value="a">Pilih Material</option>
                                                <?php
                                                $query5 = mysqli_query($koneksi, "SELECT * FROM inventory");
                                                ?>
                                                <?php if (mysqli_num_rows($query5) > 0) { ?>
                                                    <?php
                                                    while ($data5 = mysqli_fetch_array($query5)) {
                                                    ?>
                                                        <option value="<?php echo $data5["kode"]; ?>"><?php echo $data5["nama"]; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Jumlah item yang diambil</label>
                                            <input class="form-control py-4" name="jumlah" type="text" /></div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" value="Submit"></div>
                            </form>
                    <?php }
                    } ?>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>List Persediaan Raw Material</div>
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
                            echo "<div class='breadcrumb mb-4'; 'bg-danger'>Warning Sudah Dikirim!</div>";
                        }
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
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
                                            <td><?php echo $data["kategori"]; ?></td>
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php
                                                if ($data["jumlah"] <= '50') {
                                                ?><button class="btn btn-danger">Warning For Restock</button>
                                                <?php
                                                } else { ?>
                                                    Available
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <form class="user" method="post" action="../../sistem/conn_isiulang.php">
                                                    <input type="hidden" required="required" class="form-control form-control-user" name="status" value="Warning For Restock">
                                                    <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data["id"]; ?>">
                                                    <input type="submit" class="btn btn-warning" value="Minta Isi Ulang">
                                                </form>
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
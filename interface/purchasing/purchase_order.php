<?php include "../../foundation/purchasingnav.php" ?>

<?php include "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM purchase where status='submited to finance departement'");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Purchase Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"> <?php echo $_SESSION['username']; ?> | <?php echo $_SESSION['level']; ?> </li>

            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Cek Inventory</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="inventory.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Budgeting</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="budgeting.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-edit mr-1"></i>Form Purchase Order</div>
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
                            <form action="../../sistem/conn_purchase.php" method="post">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Nama Barang</label>
                                            <input class="form-control py-4" name="tanggal" type="hidden" value="<?php echo date('d-m-yy') ?>" />
                                            <input class="form-control py-4" name="status" type="hidden" value="submited to finance departement" />
                                            <input class="form-control py-4" name="nama" type="text" value="<?php echo $data3["nama"]; ?>" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Jumlah</label>
                                            <input class="form-control py-4" name="jumlah" type="text" placeholder="masukkan jumlah barang yang dipesan" /></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Total Cost</label>
                                            <input class="form-control py-4" name="totalcost" type="text" placeholder="masukkan total biaya" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputConfirmPassword">Deadline</label>
                                            <input class="form-control py-4" id="inputConfirmPassword" type="date" name="deadline" /></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Supplier</label>
                                    <select class="form-control form-control-user" name="supplier">
                                        <option value="a">Pilih Supplier</option>
                                        <?php
                                        $query4 = mysqli_query($koneksi, "SELECT * FROM supplier");
                                        ?>
                                        <?php if (mysqli_num_rows($query4) > 0) { ?>
                                            <?php
                                            while ($data4 = mysqli_fetch_array($query4)) {
                                            ?>
                                                <option value="<?php echo $data4["nama"]; ?>"><?php echo $data4["nama"]; ?> | Supplier : <?php echo $data4["jenis_vendor"]; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" value="Submit"></div>
                            </form>
                    <?php }
                    } ?>
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
                            echo "<div class='breadcrumb mb-4'; 'bg-danger'>pesanan anda sudah masuk silahkan tunggu hingga departement finance melakukan ACC</div>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "allow2") {
                            echo "<div class='breadcrumb mb-4'; 'bg-danger'>pesanan yang anda kehendaki sudah terhapus</div>";
                        }
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total Biaya</th>
                                    <th>Deadline</th>
                                    <th>Supplier</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total Biaya</th>
                                    <th>Deadline</th>
                                    <th>Supplier</th>
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
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php echo $data["totalcost"]; ?></td>
                                            <td><?php echo $data["deadline"]; ?></td>
                                            <td><?php echo $data["supplier"]; ?></td>
                                            <td><?php echo $data["status"]; ?></td>
                                            <td>
                                                <form class="user" method="post" action="../../sistem/conn_hapuspur.php">
                                                    <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data["id"]; ?>">
                                                    <input type=submit class="btn btn-danger" value="Delete">
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
<?php include "../../foundation/purchasingnav.php" ?>

<?php include "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM supplier");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Supplier</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"> <?php echo $_SESSION['username']; ?> | <?php echo $_SESSION['level']; ?> </li>

            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Cek Inventory</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="inventory.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Purchase Order</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="purchase_order.php">View Details</a>
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

            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-edit mr-1"></i>Daftarkan Supplier</div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "allow3") {
                                    echo "<div class='breadcrumb mb-4'; 'bg-danger'>berhasil submit</div>";
                                }
                            }
                            ?>
                            <form class="user" method="post" action="../../sistem/conn_submitsup.php">
                                <div class="modal-body">

                                    <label>Kode Supplier</label>
                                    <input type="text" required="required" class="form-control form-control-user" name="kode">

                                    <div class="form-group">
                                        <label>Nama Supplier</label>
                                        <input type="text" required="required" class="form-control form-control-user" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="text" required="required" class="form-control form-control-user" name="kontak">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text area" required="required" class="form-control form-control-user" name="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Vendor</label>
                                        <select class="form-control form-control-user" name="jenis_vendor">
                                            <option value="tidak ada">Pilih Jenis Vendor</option>
                                            <option value="Raw Material">Raw Material</option>
                                            <option value="Mesin">Mesin</option>
                                            <option value="Bahan Penolong">Bahan Penolong</option>
                                            <option value="Bahan Habis Pakai">Bahan Habis Pakai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-Success" value="Submit">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Supplier List</div>
            <div class="card-body">
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "deny") {
                        echo "<div class='breadcrumb mb-4'; 'bg-danger'>error!</div>";
                    }
                }
                ?>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "allow") {
                        echo "<div class='breadcrumb mb-4'; 'bg-danger'>Supplier berhasil di edit</div>";
                    }
                }
                ?>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "allow2") {
                        echo "<div class='breadcrumb mb-4'; 'bg-danger'>Supplier berhasil di hapus</div>";
                    }
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Kontak </th>
                                <th>Alamat</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Kontak </th>
                                <th>Alamat</th>
                                <th>Kategori</th>
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
                                        <td><?php echo $data["kontak"]; ?></td>
                                        <td><?php echo $data["alamat"]; ?></td>
                                        <td><?php echo $data["jenis_vendor"]; ?></td>
                                        <td>
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal<?php echo $data["kode"]; ?>"><span class="text">Action</span></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal<?php echo $data["kode"]; ?>" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Supplier</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form class="user" method="post" action="../../sistem/conn_editsup.php">

                                                            <div class="modal-body">

                                                                <label>Kode Supplier <?php echo $data["kode"]; ?></label>
                                                                <input type="hidden" required="required" class="form-control form-control-user" name="kode" value="<?php echo $data["kode"]; ?>">

                                                                <div class="form-group">
                                                                    <label>Nama Supplier</label>
                                                                    <input type="text" required="required" class="form-control form-control-user" name="nama" value="<?php echo $data["nama"]; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Kontak</label>
                                                                    <input type="text" required="required" class="form-control form-control-user" name="kontak" value="<?php echo $data["kontak"]; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <input type="text area" required="required" class="form-control form-control-user" name="alamat" value="<?php echo $data["alamat"]; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jenis Vendor</label>
                                                                    <input type="text" required="required" class="form-control form-control-user" name="jenis_vendor" value="<?php echo $data["jenis_vendor"]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary" type="button" data-dismiss="modal">Cancle</button>
                                                                <input type="submit" class="btn btn-warning" value="update">
                                                        </form>
                                                        <form class="user" method="post" action="../../sistem/conn_hapussup.php">
                                                            <input type="hidden" required="required" class="form-control form-control-user" name="kode" value="<?php echo $data["kode"]; ?>">
                                                            <input type=submit class="btn btn-danger" value="Delete">
                                                        </form>
                                                    </div>
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
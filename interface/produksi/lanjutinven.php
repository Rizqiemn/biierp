<?php
include "../../foundation/produksinav.php";
include "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM inventory");
?>


<?php
$kode = $_GET['pesan'];
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Inventory Check</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"> <?php echo $_SESSION['username']; ?> | <?php echo $_SESSION['level']; ?> </li>

            </ol>
            <div class="row">
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
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Id Order</label>
                                    <select class="form-control form-control-user" name="id_order">
                                        <option value="a">Pilih Id Order</option>
                                        <?php
                                        $query4 = mysqli_query($koneksi, "SELECT * FROM ordercustomer Where status='Pengerjaan'");
                                        ?>
                                        <?php if (mysqli_num_rows($query4) > 0) { ?>
                                            <?php
                                            while ($data4 = mysqli_fetch_array($query4)) {
                                            ?>
                                                <option value="<?php echo $data4["id"]; ?>"><?php echo $data4["id"]; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Material</label>
                                            <input class="form-control py-4" name="item" type="text" value="<?php echo $kode; ?>/></div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1">Jumlah item yang diambil</label>
                                                <input class="form-control py-4" name="jumlah" type="text" value="" /></div>
                                        </div>
                                    </div>
                                    <div class=" form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" value="Submit"></div>
                            </form>
                    <?php }
                    } ?>
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
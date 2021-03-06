<?php include "../../foundation/salesnav.php" ?>

<?php include "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM purchase where status='submited to finance departement'");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Buat Promosi </h1>
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
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Report</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="report.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-edit mr-1"></i>Buat Promosi Menarik!</div>
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
                            echo "<div class='breadcrumb mb-4'; 'bg-danger'>Promosi terposting!</div>";
                        }
                    }
                    ?>
                    <form action="../../sistem/conn_promo.php" method="post">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="small mb-1">Judul Promo</label>
                                    <input class="form-control py-4" name="nama" type="text" />
                                    <hr>
                                    <label class="small mb-1">Deskripsi</label>
                                    <input class="form-control py-4" name="deskipsi" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" value="Submit"></div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "deny") {
                    echo "<div class='breadcrumb mb-4'; 'bg-danger'>Maaf pesanan anda tidak terkirim, coba lagi</div>";
                }
            }
            ?>
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "allow4") {
                    echo "<div class='breadcrumb mb-4'; 'bg-danger'>Promo Terhapus!</div>";
                }
            }
            ?>
            <div class="row">
                <?php if (mysqli_num_rows($query3) > 0) { ?>
                    <?php
                    while ($data3 = mysqli_fetch_array($query3)) {
                    ?>

                        <div class="col-xl-3 col-md-6">
                            <form class="user" method="post" action="../../sistem/conn_hapuspromo.php">
                                <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data3["id"]; ?>">
                                <input type=submit class="btn btn-danger" value="x">
                            </form>
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><?php echo $data3["nama"]; ?>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link"><?php echo $data3["deskipsi"]; ?></a>
                                </div>
                            </div>

                        </div>
                <?php    }
                } ?>
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
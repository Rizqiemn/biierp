<?php include "../../foundation/customernav.php" ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Promo</h1>
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
            </div>
            <div class="row">
                <?php if (mysqli_num_rows($query3) > 0) { ?>
                    <?php
                    while ($data3 = mysqli_fetch_array($query3)) {
                    ?>
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-shopping-bag mr-1"></i><?php echo $data3["nama"]; ?></div>
                                <div class="card-body">
                                    <p><?php echo $data3["deskipsi"]; ?></p>
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
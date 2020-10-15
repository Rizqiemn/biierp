<?php include "../../foundation/financenav.php" ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Incoming Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"> <?php echo $_SESSION['username']; ?> | <?php echo $_SESSION['level']; ?> </li>

            </ol>
            <div class="row">


            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Detail Order</div>
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
                            echo "<div class='breadcrumb mb-4'; 'bg-danger'>Pesanan tersebut akan diproses!</div>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "allow2") {
                            echo "<div class='breadcrumb mb-4'; 'bg-danger'>Pesanan terhapus!</div>";
                        }
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pemesan</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Pembayaran</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pemesan</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Pembayaran</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if (mysqli_num_rows($jmlord) > 0) { ?>
                                    <?php
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($jmlord)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data["tanggal"]; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["prod"]; ?></td>
                                            <td><?php echo $data["jumlah"]; ?></td>
                                            <td><?php echo $data["pembayaran"]; ?></td>
                                            <td><?php echo $data["alamat"]; ?></td>
                                            <td><?php echo $data["kontak"]; ?></td>
                                            <td><?php echo $data["status"]; ?></td>
                                            <td>
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data["id"]; ?>"><span class="text">Konfirm</span></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal<?php echo $data["id"]; ?>" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Form Pesan Produk</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <form class="user" method="post" action="../../sistem/conn_lunas.php">
                                                                <div class="modal-body">
                                                                    <label>Pemesan : <?php echo $data['nama']; ?></label><br>
                                                                    <label>Produk : <?php echo $data['prod']; ?></label><br>
                                                                    <label>Pembayaran : <?php echo $data['pembayaran']; ?></label>
                                                                    <div class="form-group">
                                                                        <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data['id']; ?>">
                                                                    </div>
                                                                    <label>Status</label>
                                                                    <div class="form-group">
                                                                        <input type="radio" Checked required="required" name="status" value="<?php echo $data['status']; ?>"> Belum Bayar
                                                                        <input type="radio" required="required" name="status" value="Lunas"> Lunas
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancle</button>
                                                                    <input type="submit" class="btn btn-warning" value="Edit">
                                                            </form>
                                                            <form class="user" method="post" action="../../sistem/conn_hapusord.php">
                                                                <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data["id"]; ?>">
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
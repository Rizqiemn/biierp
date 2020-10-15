<?php include "../../foundation/adminnav.php" ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">User Data</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"> <?php echo $_SESSION['username']; ?> | <?php echo $_SESSION['level']; ?> </li>

            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-edit mr-1"></i>Form Daftar User</div>
                <div class="card-body">
                    <form action="../../sistem/conn_inputuser.php" method="post">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1">Nama</label>
                                    <input class="form-control py-4" name="nama" type="text" placeholder="masukkan nama" /></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1">Kontak User</label>
                                    <input class="form-control py-4" name="phone" type="text" placeholder="masukkan kontak" /></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1">Username</label>
                                    <input class="form-control py-4" name="username" type="text" placeholder="masukkan Username" /></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1">Password</label>
                                    <input class="form-control py-4" name="password" type="text" placeholder="masukkan Password" /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Email</label>
                            <input class="form-control py-4" name="email" type="text" placeholder="masukkan Email" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Level</label>
                            <select class="form-control form-control-user" name="level">
                                <option value="">Pilih Level</option>
                                <option value="purchasing">Purchasing</option>
                                <option value="sales">Sales</option>
                                <option value="produksi">Produksi</option>
                                <option value="finance">Finance</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                        <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" value="Submit"></div>
                    </form>
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
                            echo "<div class='breadcrumb mb-4 bg-info'>Data Berhasil Masuk</div>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "allow2") {
                            echo "<div class='breadcrumb mb-4 bg-success'>Data Berhasil di Edit</div>";
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
                                    <th>Email</th>
                                    <th>Level</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kontak</th>
                                    <th>Email</th>
                                    <th>Level</th>

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
                                            <td><?php echo $data["email"]; ?></td>
                                            <td><?php echo $data["level"]; ?></td>

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
                                                            <form class="user" method="post" action="../../sistem/conn_updateuser.php">

                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Nama <?php echo $data["nama"]; ?></label>
                                                                        <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data["id"]; ?>">
                                                                        <input type="text" required="required" class="form-control form-control-user" name="nama" value="<?php echo $data["nama"]; ?>">
                                                                        <label>Kontak <?php echo $data["nama"]; ?></label>
                                                                        <input type="text" required="required" class="form-control form-control-user" name="phone" value="<?php echo $data["phone"]; ?>">
                                                                        <label>Email <?php echo $data["email"]; ?></label>
                                                                        <input type="text" required="required" class="form-control form-control-user" name="email" value="<?php echo $data["email"]; ?>">
                                                                        <label>Username <?php echo $data["nama"]; ?></label>
                                                                        <input type="text" required="required" class="form-control form-control-user" name="username" value="<?php echo $data["username"]; ?>">
                                                                        <label>Password <?php echo $data["nama"]; ?></label>
                                                                        <input type="text" required="required" class="form-control form-control-user" name="password" value="<?php echo $data["password"]; ?>">
                                                                        <label>Level <?php echo $data["nama"]; ?></label>
                                                                        <select class="form-control form-control-user" name="level">
                                                                            <option value="<?php echo $data["level"]; ?>"><?php echo $data["level"]; ?></option>
                                                                            <option value="purchasing">Purchasing</option>
                                                                            <option value="sales">Sales</option>
                                                                            <option value="produksi">Produksi</option>
                                                                            <option value="finance">Finance</option>
                                                                            <option value="admin">admin</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">cancel</button>
                                                                    <input type="submit" class="btn btn-warning" value="Simpan">
                                                                    <form action="../../conn_deleteuser" method="post">
                                                                        <input type="hidden" required="required" class="form-control form-control-user" name="id" value="<?php echo $data["id"]; ?>">
                                                                        <input type="submit" class="btn btn-danger" value="Tendang!">
                                                                    </form>
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
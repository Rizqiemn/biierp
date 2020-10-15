<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BILI - Register Page</title>
    <link href="../dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-success">
    <div class="container">
        <ol class="breadcrumb mb-5 bg-success">
        </ol>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-5 bg-success">
                    <div>
                        <center><img src="../foundation/logo.jpg" width="530" height="365"></center>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <h5>Register Here</h5>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="../sistem/conn_registrasi.php" method="post">
                            <center>
                                <table class="breadcrumb">
                                    <tr>
                                        <td><label>Nama</label></td>
                                        <td><input type="text" name="nama" class="form_login" placeholder="Name .." required="required"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Email</label></td>
                                        <td><input type="text" name="email" class="form_login" placeholder="Email .." required="required"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Phone</label></td>
                                        <td><input type="text" name="phone" class="form_login" placeholder="Phone .." required="required"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Username</label></td>
                                        <td><input type="text" name="username" class="form_login" placeholder="Username .." required="required"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Password</label></td>
                                        <td><input type="text" name="password" class="form_login" placeholder="Password .." required="required"></td>
                                        <input type="hidden" name="level" value="customer" placeholder="Name .." required="required">
                                    </tr>
                                </table>
                            </center>
                            <input type="submit" class="btn btn-primary" value="REGISTER">

                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="../interface/login.php">Have an account? Login!</a></div></a>
                    </div>
                </div>
            </div>
        </div>
        <ol class="breadcrumb mb-5 bg-success">
        </ol>
    </div>
    </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; PT BILI</div>
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
    <script src="../dist/js/scripts.js"></script>
</body>

</html>
<?php
include '../koneksi/koneksi.php';

$kode = $_POST['kode'];
$jumlah = $_POST['jumlah'];

$sql = mysqli_query($koneksi, "SELECT * FROM inventory where kode = '$kode'");
if (mysqli_num_rows($sql) > 0) {
    while ($data5 = mysqli_fetch_array($sql)) {
        $a = $data5["jumlah"];
    }
}

$jumlah2 = $a - $jumlah;

$sql2 = mysqli_query($koneksi, "UPDATE inventory SET jumlah = '$jumlah2' where kode = '$kode'");

if (mysqli_query($koneksi, $sql2)) {
    header('location:../interface/produksi/lanjutinven.php?pesan=$kode');
} else {
    echo "
    <center>
    <br>
    <h2>Form Lanjutan Pengambilan Barang</h2>
    <form action='conn_ambilitem2.php' method='post'>
        <table border='2'>
            <tr>
                <td>Id Order / Keperluan untuk</td>
                <td>Kode Barang</td>
                <td>Jumlah</td>
            </tr>
            <tr>
                <td><input type='text' name='id_order' placeholder='masukkan id order'></td>
                <td><input type='text' name='kode' value='$kode'></td>
                <td><input type='text' name='jumlah' value='$jumlah'></td>
            </tr>
            <tr>
                <td colspan='3'><center><input type='submit' value='SUBMIT'></center></td>
            </tr>
        </table>
    </form>
    </center>
    ";
}

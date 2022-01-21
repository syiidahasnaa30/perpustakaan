<?php
//session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} else {
    if (isset($_GET['GetID'])) {
        $id = $_GET['GetID'];
        require_once('koneksi.php');
        $query = "SELECT * FROM ANGGOTA WHERE IDAGGOTA ='$id'";
        $parsesql = oci_parse($conn, $query);
        oci_execute($parsesql);
        $list = oci_fetch_assoc($parsesql);
    }
}
?>
<html>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Anggota</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulir Edit Data Anggota</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="upadate_anggota.php?GetID=<?php echo $id; ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input class="form-control" type="text" name="nama" value="<?php echo $list['NAMA']; ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" type="text" name="alamat" value="<?php echo $list['ALAMAT']; ?>">
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input class="form-control" type="text" name="kota" value="<?php echo $list['KOTA']; ?>">
                </div>
                <div class="form-group">
                    <label for="notelp">No Telpon</label>
                    <input class="form-control" type="text" name="notelp" value="<?php echo $list['NOTELPON']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email </label>
                    <input class="form-control" type="email" name="email" value="<?php echo $list['EMAIL']; ?>">
                </div>
                <button name="batal" class="btn btn-active"><a href="index.php?hal=dataanggota">Batal</a></button>
                <button class="btn btn-primary" name="simpan">Simpan Peubahan</button>
            </div>
        </form>
    </div>
</section>

</html>
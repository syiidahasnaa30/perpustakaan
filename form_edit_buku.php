<?php
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} else {
    if (isset($_GET['GetID'])) {
        $id = $_GET['GetID'];
        require_once('koneksi.php');
        $query = "SELECT * FROM BUKU WHERE IDBUKU ='$id'";
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
                <h1>Input Anggota Baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Input Anggota</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulir Input Anggota</h3>
        </div>
        <form role="form" action="update_buku.php?GetID=<?php echo $id; ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="judul">Judul Buku </label><br>
                    <input class="form-control" type="text" name="judul" value="<?php echo $list['JUDULBUKU']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label><br>
                    <input class="form-control" type="text" name="pengarang" value="<?php echo $list['PENGARANG']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label><br>
                    <input class="form-control" type="text" name="penerbit" value="<?php echo $list['PENERBIT']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label><br>
                    <input class="form-control" type="text" name="tahun" value="<?php echo $list['TAHUNTERBIT']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Buku</label><br>
                    <input class="form-control" type="text" name="jenis" value="<?php echo $list['JENISBUKU']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Buku</label><br>
                    <input class="form-control" type="number" name="jumlah" value="<?php echo $list['JUMLAH']; ?>"><br>
                </div>
                <button name="batal" class="btn btn-active"><a href="index.php?hal=databuku">Batal</a></button>
                <button name="simpan" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</section>

</html>
<?php
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
}
require_once('koneksi.php');
?>
<html>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Peminjaman Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Formulir Peminjaman Buku</li>
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
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="pinjam.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Nomor Anggota</label>
                    <select name="idanggota" class="custom-select">
                        <?php
                        $query0 = "SELECT * FROM ANGGOTA";
                        $parsesql0 = oci_parse($conn, $query0);
                        $result = oci_execute($parsesql0);
                        while ($list = oci_fetch_array($parsesql0)) {
                        ?>
                            <option value=<?php echo $list['IDAGGOTA']; ?>><?php echo $list['IDAGGOTA'] . "-" . $list['NAMA']; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Buku</label>
                    <select name="idbuku" class="custom-select">
                        <?php
                        $query = "SELECT * FROM BUKU";
                        $parsesql = oci_parse($conn, $query);
                        $result = oci_execute($parsesql);
                        while ($list = oci_fetch_array($parsesql)) {
                        ?>
                            <option value=<?php echo $list['IDBUKU']; ?>><?php echo $list['IDBUKU'] . "-" . $list['JUDULBUKU']; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tglpinjam">Tgl Pinjam</label>
                    <input name="tglpinjam" type="date" class="form-control" id="kota" placeholder="masukkan kota">
                </div>
                <div class="form-group">
                    <label for="btskembali">Batas Pengembalian</label>
                    <input name="btskembali" type="date" class="form-control" id="notelp" placeholder="masukkan kota">
                </div>
                <button name="kembali" class="btn btn-active">Kembali</button>
                <button name="lanjut" class="btn btn-primary">Lanjut</button>
            </div>

        </form>
    </div>
</section>

</html>
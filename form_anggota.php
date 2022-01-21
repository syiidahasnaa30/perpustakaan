<?php
//session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} ?>
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
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="insert_anggota.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="masukkan nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input name="alamat" type="text" class="form-control" id="alamat" placeholder="masukkan alamat">
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input name="kota" type="text" class="form-control" id="kota" placeholder="masukkan kota">
                </div>
                <div class="form-group">
                    <label for="notelp">No Telpon</label>
                    <input name="notelp" type="text" class="form-control" id="notelp" placeholder="masukkan kota">
                </div>
                <div class="form-group">
                    <label for="email">Email </label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="masukkan email">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button name="tambah" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</section>

</html>
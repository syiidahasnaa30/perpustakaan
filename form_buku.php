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
                <h1>Input Buku Baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Input Buku</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulir Input Buku</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="insert_buku.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="judul">Judul Buku </label>
                    <input class="form-control" type="text" name="judul">
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input class="form-control" type="text" name="pengarang">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input class="form-control" type="text" name="penerbit">
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label>
                    <input class="form-control" type="text" name="tahun">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Buku</label>
                    <select name="jenis" class="custom-select">
                        <option value="Novel">Novel</option>
                        <option value="Komik">Komik</option>
                        <option value="Sejarah">Sejarah</option>
                        <option value="Agama">Agama</option>
                        <option value="Umum">Umum</option>
                        <option value="Pelajaran">Pelajaran</option>
                    </select>
                </div>
                <div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Buku</label>
                        <input class="form-control" type="number" name="jumlah">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="form-group">
                        <label for="tambah"></label>
                        <button name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

        </form>
    </div>
</section>


</html>
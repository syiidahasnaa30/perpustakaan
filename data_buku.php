<?php
require_once('koneksi.php');
//session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
}
?>
<html>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Buku</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Buku Perpustakaan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
                <!--
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" id="cari" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                -->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Judul Buku</td>
                        <td>Kode Buku</td>
                        <td>Pengarang </td>
                        <td>Penerbit</td>
                        <td>Tahun Terbit</td>
                        <td>Jenis Buku</td>
                        <td>Jumlah Buku</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <?php
                $query = "SELECT * FROM BUKU  ORDER BY JUDULBUKU ASC";
                $parsesql = oci_parse($conn, $query);
                oci_execute($parsesql);
                $no = 1;
                while ($list = oci_fetch_array($parsesql)) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $list['JUDULBUKU']; ?></td>
                        <td><?php echo $list['IDBUKU']; ?></td>
                        <td><?php echo $list['PENGARANG']; ?></td>
                        <td><?php echo $list['PENERBIT']; ?></td>
                        <td><?php echo $list['TAHUNTERBIT']; ?></td>
                        <td><?php echo $list['JENISBUKU']; ?></td>
                        <td><?php echo $list['JUMLAH']; ?></td>
                        <td>
                            <button class="badge bg-warning"><a href="index.php?hal=editbuku&&GetID=<?php echo $list['IDBUKU']; ?>">Ubah</a></button>
                            <button class="badge bg-danger"><a href="delete_buku.php?GetID=<?php echo $list['IDBUKU']; ?>">Hapus</a></button>
                        </td>
                    </tr>

                <?php
                    $no++;
                }
                ?>

            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <button class="badge badge-succes float-left"><a href="index.php?hal=inputbuku">Tambah Buku</a></button>
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
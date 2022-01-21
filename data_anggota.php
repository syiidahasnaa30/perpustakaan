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
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Anggota</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Anggota Perpustakaan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td width="100px">Nama</td>
                        <td width="20px">Nomor Anggota</td>
                        <td width="70px">Alamat</td>
                        <td width="20px">Kota</td>
                        <td>No Telpon</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <?php
                $query = "SELECT * FROM ANGGOTA ORDER BY NAMA ASC";
                $parsesql = oci_parse($conn, $query);
                oci_execute($parsesql);
                $no = 1;
                while ($list = oci_fetch_array($parsesql)) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $list['NAMA']; ?></td>
                        <td><?php echo $list['IDAGGOTA']; ?></td>
                        <td><?php echo $list['ALAMAT']; ?></td>
                        <td><?php echo $list['KOTA']; ?></td>
                        <td><?php echo $list['NOTELPON']; ?></td>
                        <td><?php echo $list['EMAIL']; ?></td>
                        <td>
                            <i class=""></i>
                            <button class="badge bg-warning"><a href="index.php?hal=editanggota&&GetID=<?php echo $list['IDAGGOTA']; ?>">Ubah</a></button>
                            <button class="badge bg-danger"><a href="delete_anggota.php?GetID=<?php echo $list['IDAGGOTA']; ?>">Hapus</a></button>
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
            <button class="btn btn-active float-left"><a href="index.php?hal=inputanggota">Input Angggota Baru</a></button>
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

</html>
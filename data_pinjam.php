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
                <h1>Data Transaksi Peminjaman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Peminjaman</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Transaksi Peminjaman Buku</h3>
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
                        <td>Nama</td>
                        <td width="20px">Nomor Anggota</td>
                        <td>Judul Buku</td>
                        <td>Tgl Pinjam</td>
                        <td>Batas Kembali</td>
                        <td>Tgl Kembali</td>
                        <td>Keterangan</td>
                    </tr>
                </thead>

                <?php
                require_once('koneksi.php');
                $query = "SELECT PINJAM.IDPINJAM AS IDPINJAM, PINJAM.IDBUKU AS PBUKU, PINJAM.IDAGGOTA AS PANGGOTA,PINJAM.TGLPINJAM AS PINJAM, PINJAM.BTSKEMBALI AS BATAS,
                    PINJAM.TGLKEMBALI AS KEMBALI, ANGGOTA.IDAGGOTA AS ID, ANGGOTA.NAMA AS NAMA, BUKU.IDBUKU AS BBUKU, BUKU.JUDULBUKU AS JUDUL
                    FROM PINJAM,ANGGOTA,BUKU WHERE PINJAM.IDBUKU=BUKU.IDBUKU AND PINJAM.IDAGGOTA=ANGGOTA.IDAGGOTA ORDER BY PINJAM.TGLPINJAM ASC";
                $parsesql = oci_parse($conn, $query);
                $result = oci_execute($parsesql);
                $no = 1;
                while ($list = oci_fetch_array($parsesql)) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $list['NAMA']; ?></td>
                        <td><?php echo $list['ID']; ?></td>
                        <td><?php echo $list['JUDUL']; ?></td>
                        <td><?php echo $list['PINJAM']; ?></td>
                        <td><?php echo $list['BATAS']; ?></td>
                        <td><?php if (isset($list['KEMBALI'])) {
                                echo $list['KEMBALI'];
                                $status = 1;
                            } else {
                                echo "belum dikembalikan";
                                $status = 0;
                            }
                            ?></td>
                        <td>
                            <?php if ($status == 0) { ?>
                                <button class="btn-sm bg-success"><a href="edit_pinjam.php?GetID=<?php echo $list['IDPINJAM']; ?>">dikembalikan</a></button>
                            <?php
                            } else {
                                echo "sudah dikembalikan";
                            } ?>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>
</section>

</html>
<div class="card">
    <div class="card-header bg-danger">
        <h3 class="card-title">Buku Yang Belum Dikembalikan</h3>
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
                    <td>Keterangan</td>
                    <td>Aksi</td>
                </tr>
            </thead>

            <?php
            require_once('koneksi.php');
            $query = "SELECT PINJAM.IDPINJAM AS IDPINJAM, PINJAM.IDBUKU AS PBUKU, PINJAM.IDAGGOTA AS PANGGOTA,PINJAM.TGLPINJAM AS PINJAM, PINJAM.BTSKEMBALI AS BATAS,
                    PINJAM.TGLKEMBALI AS KEMBALI, ANGGOTA.IDAGGOTA AS ID, ANGGOTA.NAMA AS NAMA, BUKU.IDBUKU AS BBUKU, BUKU.JUDULBUKU AS JUDUL
                    FROM PINJAM,ANGGOTA,BUKU WHERE PINJAM.IDBUKU=BUKU.IDBUKU AND PINJAM.IDAGGOTA=ANGGOTA.IDAGGOTA AND PINJAM.TGLKEMBALI IS NULL  ORDER BY PINJAM.TGLPINJAM ASC";
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
                    <td><?php
                        $date1 = date_create($list['BATAS']);
                        $date2 = date_create(date('d-m-Y h:i:s'));
                        $diff = date_diff($date1, $date2);
                        if ($diff->format('%R') == '-') {
                            echo "tersisa " . $diff->format('%a') . " hari";
                        } else {
                            echo "terlambat " . $diff->format('%a') . " hari ";
                        }
                        ?>
                    </td>
                    <td>
                        <button class="btn-sm bg-success"><a href="edit_pinjam.php?GetID=<?php echo $list['IDPINJAM']; ?>">dikembalikan</a></button>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>


        </table>
    </div>
</div>
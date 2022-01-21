<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} else {
    require_once('koneksi.php');
    if (isset($_POST['simpan'])) {
        $id = $_GET['GetID'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];
        $query = "UPDATE BUKU SET JUDULBUKU='$judul',PENGARANG='$pengarang',PENERBIT='$penerbit',TAHUNTERBIT='$tahun',
    JENISBUKU='$jenis',JUMLAH='$jumlah' WHERE IDBUKU='$id'";
        $parsesql = oci_parse($conn, $query);
        oci_execute($parsesql);
        if (oci_execute($parsesql)) {
            echo "<script>alert('Perubahan Berhasil Disimpan');</script>";
            echo "<script>location='index.php?hal=databuku';</script>";
        } else {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            echo "perubahan gagal";
        }
    }
}

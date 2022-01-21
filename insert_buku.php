<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} else {
    require_once('koneksi.php');
    if (isset($_POST['tambah'])) {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];
        $query = "INSERT INTO BUKU (JUDULBUKU,PENGARANG,PENERBIT,TAHUNTERBIT,JENISBUKU,JUMLAH) 
    VALUES('$judul','$pengarang','$penerbit','$tahun','$jenis','$jumlah')";
        $parsesql = oci_parse($conn, $query);
        $result = oci_execute($parsesql);
        if ($result) {
            echo "<script>alert('Buku baru telah ditambahkan');</script>";
            echo "<script>location='index.php?hal=databuku';</script>";
        } else {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            echo "gagal ditambahkan";
        }
    }
}

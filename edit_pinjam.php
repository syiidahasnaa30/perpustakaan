<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
}
if (isset($_GET['GetID'])) {
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('d-m-Y h:i:s');
    $id = $_GET['GetID'];
    require_once('koneksi.php');
    $query = "UPDATE PINJAM SET TGLKEMBALI=TO_DATE('$tanggal', 'dd-mm-yy hh24:mi:ss') WHERE IDPINJAM='$id'";
    $parsesql = oci_parse($conn, $query);
    $result = oci_execute($parsesql);
    if ($result) {
        echo "<script>alert('Buku telah dikembalikan\nData telah diperbarui');</script>";
        echo "<script>location='index.php?hal=datapinjam';</script>";
    }
}

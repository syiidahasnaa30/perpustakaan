<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
}
require_once("koneksi.php ");
if (isset($_GET['GetID'])) {
    $id = $_GET['GetID'];
    $query = " DELETE FROM BUKU WHERE IDBUKU ='$id'";
    $parsesql = oci_parse($conn, $query);
    $result = oci_execute($parsesql);
    if ($result) {
        echo "<script>alert('Buku telah terhapus');</script>";
        echo "<script>location='index.php?hal=databuku';</script>";
    } else {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        echo "gagal dihapus";
    }
} else {
    header("location:data_buku.php");
}

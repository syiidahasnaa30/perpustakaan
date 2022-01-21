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
    $query = " DELETE FROM ANGGOTA WHERE IDAGGOTA ='$id'";
    $parsesql = oci_parse($conn, $query);
    oci_execute($parsesql);
    if (oci_execute($parsesql)) {
        echo "<script>alert('Anggota telah dihapus');</script>";
        echo "<script>location='index.php?hal=dataanggota';</script>";
    } else {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        echo "gagal dihapus";
    }
} else {
    header("location:data_anggota.php");
}

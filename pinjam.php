<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} else {
    if (isset($_POST['lanjut'])) {
        require_once('koneksi.php');
        $idanggota = $_POST['idanggota'];
        $idbuku = $_POST['idbuku'];
        $tglpinjam = $_POST['tglpinjam'];
        $btskembali = $_POST['btskembali'];

        $pinjam = date('d-m-Y h:i:s', strtotime($tglpinjam));
        $batas = date('d-m-Y h:i:s', strtotime($btskembali));

        $query = "INSERT INTO PINJAM (IDAGGOTA,IDBUKU,TGLPINJAM,BTSKEMBALI)
    VALUES('$idanggota','$idbuku',TO_DATE('$pinjam', 'dd-mm-yy hh24:mi:ss'),TO_DATE('$batas', 'dd-mm-yy hh24:mi:ss'))";
        $parsesql = oci_parse($conn, $query);
        $result = oci_execute($parsesql);
        if ($result) {
            echo "<script>location='index.php?hal=datapinjam';</script>";
        }
    } else if (isset($_POST['kembali'])) {
        header('location:index.php');
    }
}

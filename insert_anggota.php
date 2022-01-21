<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} else {
    require_once('koneksi.php');
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $notelp = $_POST['notelp'];
        $email = $_POST['email'];
        $query = "INSERT INTO ANGGOTA (NAMA,ALAMAT,KOTA,NOTELPON,EMAIL)
    VALUES('$nama','$alamat','$kota','$notelp','$email')";
        $parsesql = oci_parse($conn, $query);
        $result = oci_execute($parsesql);
        if ($result) {
            echo "<script>alert('Anggota baru telah ditambahkan');</script>";
            echo "<script>location='index.php?hal=dataanggota';</script>";
        } else {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            echo "gagal ditambahkan";
        }
    } else {
        echo "data tidak masuk";
    }
}

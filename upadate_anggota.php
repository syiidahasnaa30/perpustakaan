<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.html';</script>";
    exit();
} else {
    if (isset($_POST['simpan'])) {
        $id = $_GET['GetID'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $notelp = $_POST['notelp'];
        $email = $_POST['email'];
        require_once('koneksi.php');
        $query = "UPDATE ANGGOTA SET NAMA='$nama', ALAMAT='$alamat', KOTA='$kota', NOTELPON ='$notelp', EMAIL='$email' WHERE IDAGGOTA='$id'";
        $parsesql = oci_parse($conn, $query);
        oci_execute($parsesql);
        if (oci_execute($parsesql)) {
            echo "<script>alert('Perubahan Berhasil Disimpan');</script>";
            echo "<script>location='index.php?hal=dataanggota';</script>";
        } else {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            echo "gagal dihapus";
        }
    }
}

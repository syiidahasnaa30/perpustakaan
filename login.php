<?php
session_start();
require_once("koneksi.php");
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT  * FROM PEGAWAI WHERE USERNAME='$username' AND PASSWORD='$password'";
$parsesql = oci_parse($conn, $query);
$result = oci_execute($parsesql);
if ($result) {
    $list = oci_fetch_assoc($parsesql);
    $_SESSION['username'] = $list['USERNAME'];
    $_SESSION['password'] = $list['PASSWORD'];
    echo "<script>alert('Berhasil login');</script>";
    echo "<script>location='index.php';</script>";
} else {
    echo "<script>alert('Username atau password salah');</script>";
    echo "<script>location='login.html';</script>";
}

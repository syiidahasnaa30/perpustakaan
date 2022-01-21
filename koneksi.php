<?php
$conn = oci_connect('perpustakaan', 'perpustakaan', 'localhost/xe');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    echo "gagal koneksi";
}

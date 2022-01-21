<?php
require_once('koneksi.php');
require_once('index.php');
if (isset($_GET['key'])) {
    $key = $_GET['key'];
    $query = "SELECT * FROM BUKU WHERE JUDULBUKU LIKE %$key% ";
    $parsesql = oci_parse($coon, $query);
    $result = oci_execute($parsesql);
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Buku</h1>
            </div>

            <form class="form-inline ml-3 float-right">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- /.container-fluid -->
</section>
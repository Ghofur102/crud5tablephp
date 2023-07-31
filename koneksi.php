<?php 

$koneksi = mysqli_connect('localhost', 'root', '', 'hummasoft_crudphpnative');
if (!$koneksi) {
    # code...
    echo "failed";
}

?>
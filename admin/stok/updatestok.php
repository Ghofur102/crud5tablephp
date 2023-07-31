<?php 

require('../../koneksi.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $sql_update = "UPDATE stok SET
    merk = '$merk',
    jenis = '$jenis',
    jumlah = '$jumlah',
    harga = '$harga' WHERE id='$id'";
    $update = mysqli_query($koneksi, $sql_update);
    header('Location: readstok.php');
}

?>
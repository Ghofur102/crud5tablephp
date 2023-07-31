<?php 

require('../../koneksi.php');
if (isset($_POST['create'])) {
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $sql_create = "INSERT INTO stok (merk, jenis, jumlah, harga) VALUE ('$merk', '$jenis', '$jumlah', '$harga')";
    $create = mysqli_query($koneksi, $sql_create);
    header('Location: readstok.php');
}

?>
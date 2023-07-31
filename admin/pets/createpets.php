<?php 

require('../../koneksi.php');

if (isset($_POST['create'])) {
    $user_id = $_POST['user_id'];
    $nama_hewan = $_POST['nama_hewan'];
    $jenis_hewan = $_POST['jenis_hewan'];

    $sql_create = "INSERT INTO pets (user_id, nama_hewan, jenis_hewan) VALUE ('$user_id', '$nama_hewan', '$jenis_hewan')";
    $create = mysqli_query($koneksi, $sql_create);
    if ($create) {
        header('Location: readpets.php');
    } else {
        header('Location: readpets.php');
    }
}

?>
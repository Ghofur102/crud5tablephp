<?php 

require('../../koneksi.php');
if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $nama_hewan = $_POST['nama_hewan'];
    $jenis_hewan = $_POST['jenis_hewan'];

    $update  = mysqli_query($koneksi, "UPDATE pets SET
    nama_hewan = '$nama_hewan',
    user_id = '$user_id',
    jenis_hewan = '$jenis_hewan'
    WHERE id='$_POST[id]' ");
    header('Location: readpets.php');
}

?>
<?php 

require('../../koneksi.php');

if (isset($_POST['create'])) {
    
    $nama = $_POST['nama_lengkap'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $nomer_ponsel = $_POST['nomer_ponsel'];

    $cek_email = mysqli_query($koneksi, "SELECT * FROM owners WHERE email='$email'");
    $cek_ponsel = mysqli_query($koneksi, "SELECT * FROM owners WHERE nomer_ponsel='$nomer_ponsel'");
    $arr_email = mysqli_fetch_array($cek_email);
    $arr_ponsel = mysqli_fetch_array($cek_ponsel);
    if ($arr_email > 0 && $arr_ponsel > 0) {
        header('Location: readowners.php');
    } else {
        header('Location: readowners.php');
    }
    $create_owner = mysqli_query($koneksi, "INSERT INTO owners (nama_lengkap, email, nomer_ponsel) VALUE ('$nama', '$email', '$nomer_ponsel')");
    if ($create_owner) {
        header('Location: readowners.php');
    } else {
        header('Location: readowners.php');
    }
}

?>
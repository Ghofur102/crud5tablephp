<?php 

require('../../koneksi.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $ponsel = $_POST['nomer_ponsel'];

    $cek1 = mysqli_query($koneksi, "SELECT * FROM owners WHERE email='$email'");
    $cek2 = mysqli_query($koneksi, "SELECT * FROM owners WHERE nomer_ponsel='$ponsel'");
    $arr_email = mysqli_fetch_array($cek1);
    $arr_ponsel = mysqli_fetch_array($cek2);

    try {
        $update = mysqli_query($koneksi, "UPDATE owners SET
        nama_lengkap = '$nama',
        email = '$email',
        nomer_ponsel = '$ponsel'
        WHERE id='$id'");
        if ($update) {
            header('Location: readowners.php');
        } else {
            header('Location: readowners.php');
        }
    } catch (Exception $th) {

    }
    header('Location: readowners.php');
}

?>
<?php

require('../../koneksi.php');

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    // cek keterkaitan ke table pets
    $cek = mysqli_query($koneksi, "SELECT * FROM pets WHERE user_id='$id'");
    $ceks = mysqli_fetch_array($cek);
    if ($ceks > 0) {
        header('Location: readowners.php');
        exit();
    } else {
        $sql_delete = "DELETE FROM owners WHERE id='$id'";
        $delete = mysqli_query($koneksi, $sql_delete);
        if ($delete) {
            header('Location: readowners.php');
        } else {
            header('Location: readowners.php');
        }
    }
}

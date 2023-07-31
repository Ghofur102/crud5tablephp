<?php

require('../../koneksi.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $foto = $_POST['tidakGantiFoto'];
    $nomer_kepegawaian = $_POST['nomer_kepegawaian'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];

    if ($_FILES['foto']['name']) {
        unlink('img/'.$foto);
        // proses upload gambar
        $ekstensi_diperbolehkan = ['jpeg', 'jpg', 'png', 'webp'];
        $fotow = $_FILES['foto']['name'];
        $foto = time() . $fotow;
        $pisah = explode('.', $foto);
        $cek = strtolower(end($pisah));
        $tmp_name = $_FILES['foto']['tmp_name'];
        if (!empty($foto) && in_array($cek, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($tmp_name, 'img/' . $foto);
        }
    } 

    try {
        //code...
        $update = mysqli_query($koneksi, "UPDATE employees SET
        nama_lengkap = '$nama_lengkap',
        foto = '$foto',
        nomer_kepegawaian = '$nomer_kepegawaian',
        jabatan = '$jabatan',
        gaji = '$gaji' WHERE id='$id'
        ");
    } catch (Exception $th) {

    }
   
    header('Location: reademployees.php');
}

<?php

require('../../koneksi.php');
if (isset($_POST['create'])) {
    // proses upload gambar
    $ekstensi_diperbolehkan = ['jpeg', 'jpg', 'png', 'webp'];
    $foto = $_FILES['foto']['name'];
    $name_foto = time() . $foto;
    $pisah = explode('.', $foto);
    $cek = strtolower(end($pisah));
    $tmp_name = $_FILES['foto']['tmp_name'];
    if (!empty($foto) && in_array($cek, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($tmp_name, 'img/' . $name_foto);
        // proses tambah data yang lain
        $nama = $_POST['nama_lengkap'];
        $nomer_kepegawaian = $_POST['nomer_kepegawaian'];
        $jabatan = $_POST['jabatan'];
        $gaji = $_POST['gaji'];

        //proses validasi unique nomer kepagawaian
        $ambil = mysqli_query($koneksi, "SELECT * FROM employees WHERE nomer_kepegawaian='$nomer_kepegawaian'");
        $arr_ambil = mysqli_fetch_array($ambil);
        if ($arr_ambil > 0) {
            header('Location: reademployees.php');
        } else {
            $create = mysqli_query($koneksi, "INSERT INTO employees (nama_lengkap, foto, nomer_kepegawaian, jabatan, gaji) VALUE ('$nama', '$name_foto', '$nomer_kepegawaian', '$jabatan', '$gaji')");
            if ($create) {
                header('Location: reademployees.php');
            } else {
                header('Location: reademployees.php');
            }
        }
    }
}

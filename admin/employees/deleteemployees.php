<?php 

require('../../koneksi.php');
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $foto = $_POST['foto'];
    // hapus foto di direktori
    unlink("img/$foto");
    $hapus = mysqli_query($koneksi, "DELETE FROM employees WHERE id='$id'");
    header('Location: reademployees.php');
}

?>
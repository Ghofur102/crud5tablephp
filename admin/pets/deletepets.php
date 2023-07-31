<?php 

require('../../koneksi.php');
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM pets WHERE id='$id'");
    header('Location: readpets.php');
}

?>
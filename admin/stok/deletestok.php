<?php 

require('../../koneksi.php');
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete  = mysqli_query($koneksi, "DELETE FROM stok WHERE id='$id'");
    header('Location: readstok.php');
}

?>
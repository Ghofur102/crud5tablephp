<?php 

require('../../koneksi.php');
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $pet_id = $_POST['pet_id'];
    // membuat invoice
    



    // mengubah isKeep pets jadi no
    $ubah = mysqli_query($koneksi, "UPDATE pets SET isKeep='no' WHERE id='$pet_id'");
    $hapus = mysqli_query($koneksi, "DELETE FROM safekeepings WHERE id='$id'");
    header('Location: readsafekeepings.php');
}

?>
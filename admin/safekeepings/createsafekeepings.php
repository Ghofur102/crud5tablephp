<?php 

require('../../koneksi.php');
if (isset($_POST['simpan'])) {
    $pet_id = $_POST['pet_id'];
    // mengubah hewan jadi sedang di jaga
    $arr = mysqli_query($koneksi, "UPDATE pets SET isKeep='yes' WHERE id='$pet_id'");
    $create = mysqli_query($koneksi, "INSERT INTO safekeepings (pet_id) VALUE ('$pet_id')");
    header('Location: readsafekeepings.php');
}

?>
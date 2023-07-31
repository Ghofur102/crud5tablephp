<?php 

require('../../koneksi.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $date_now = $_POST['date_now'];

    $update = mysqli_query($koneksi, "UPDATE safekeepings SET
    date_now = '$date_now'
    WHERE id='$id'");
    header('Location: readsafekeepings.php');
}

?>
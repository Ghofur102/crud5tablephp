<?php
include('../../template/admin/header.php');
?>
<div class="card container mx-auto my-5" style="max-width: 1000px;">
    <div class="card-header text-center">
        <h4>CRUD Safekeepings</h4>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Silakan pilih hewan yang mau dititipkan!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="createsafekeepings.php" method="post">
                            <div class="mb-3">
                                <label for="pet_id" class="form-label">Hewan</label>
                                <select name="pet_id" id="pet_id" class="form-control" required>
                                    <option value=""></option>
                                    <?php
                                    require('../../koneksi.php');
                                    $sql_read_pet = "SELECT * FROM pets WHERE isKeep='no'";
                                    $sql_pet = mysqli_query($koneksi, $sql_read_pet);
                                    while ($pets = mysqli_fetch_array($sql_pet)) {
                                    ?>
                                        <option value="<?= $pets['id'] ?>"><?= $pets['nama_hewan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer p-3">
        <h5 class="my-2 font-bold">Data Hewan Yang Dititipkan.</h5>
        <div class="row">
            <?php
            require('../../koneksi.php');
            $sql_reads = "SELECT * FROM safekeepings";
            $reads = mysqli_query($koneksi, $sql_reads);
            while ($read = mysqli_fetch_array($reads)) {
            ?>
                <div class="col-sm-12 col-md-6 col-lg-4 border rounded bg-info text-white">
                    <div class="p-3 text-center">
                        <?php
                        $arr_nameHewan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pets WHERE id='$read[pet_id]'"));
                        $arr_pemilik = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM owners WHERE id='$arr_nameHewan[user_id]'"));
                        ?>
                        Nama Hewan: <?= $arr_nameHewan['nama_hewan']  ?> <br>
                        Nama Pemilik: <?= $arr_pemilik['nama_lengkap'] ?> <br>
                        Email Pemilik: <?= $arr_pemilik['email'] ?> <br>
                        Tanggal Penitipan: <?= $read['date_now'] ?> <br>
                        <div class="row my-3">
                            <div class="col-6">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $read['id'] ?>">
                                    Edit Tanggal
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $read['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="updatesafekeepings.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $read['id'] ?>">
                                                    <div class="mb-3">
                                                        <label for="date_now" class="form-label">Tanggal Penitipan</label>
                                                        <input type="datetime-local" name="date_now" id="date_now" class="form-control" value="<?= $read['date_now'] ?>">
                                                    </div>
                                                    <div class="mb-3 text-center">
                                                        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <form action="deletesafekeepings.php" method="post">
                                    <input type="hidden" name="pet_id" value="<?= $read['pet_id'] ?>">
                                    <input type="hidden" name="id" value="<?= $read['id'] ?>">
                                    <button type="submit" name="hapus" class="btn btn-danger" onclick="return confirm('Yakin mau mengambil hewan ini?')">Ambil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include('../../template/admin/footer.php');
?>
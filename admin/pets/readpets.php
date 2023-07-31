<?php include('../../template/admin/header.php') ?>
<div class="card container bg-light my-5" style="max-width: 1000px;">
    <div class="card-header text-center">
        <h4>CRUD Hewan Peliharaan</h4>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">
            Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Hewan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="createpets.php" method="post">
                            <div class="mb-3">
                                <label for="nama_hewan" class="form-label">Nama Hewan</label>
                                <input type="text" class="form-control" name="nama_hewan" id="nama_hewan" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Nama Pemilik</label>
                                <select class="form-control" name="user_id" id="user_id" required>
                                    <option value=""></option>
                                    <?php
                                    include('../../koneksi.php');
                                    $sql = mysqli_query($koneksi, "SELECT * FROM owners");
                                    while ($read = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $read['id'] ?>"><?= $read['nama_lengkap'] . " - " . $read['email'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_hewan" class="form-label">Jenis Hewan</label>
                                <select name="jenis_hewan" id="jenis_hewan" class="form-control" required>
                                    <option value=""></option>
                                    <option value="anjing">Anjing</option>
                                    <option value="kucing">Kucing</option>
                                </select>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="create" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="container mx-auto p-4 row">
            <?php
            $sql1 = "SELECT * FROM pets";
            $reads_pets = mysqli_query($koneksi, $sql1);
            while ($pet = mysqli_fetch_assoc($reads_pets)) {
            ?>
                <div class="col-sm-12 col-md-6 border rounded p-1">
                    <p>Nama Hewan : <span class="text-info"><?= $pet['nama_hewan'] ?></span></p>
                    <p>Jenis Hewan : <span class="text-info"><?= $pet['jenis_hewan'] ?></span></p>
                    <?php
                    $sqls = "SELECT * FROM owners WHERE id='$pet[user_id]'";
                    $sql_sqls = mysqli_query($koneksi, $sqls);
                    $owner = mysqli_fetch_assoc($sql_sqls)
                    ?>
                    <p>Nama Pemilik : <span class="text-primary"><?= $owner['nama_lengkap'] . " (" . $owner['email'] . " )"  ?></span></p>
                    <div class="row my-1">
                        <div class="col-sm-12 col-md-2 m-1">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModals<?= $pet['id'] ?>">
                                Update
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModals<?= $pet['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Hewan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="updatepets.php" method="post">
                                                <input type="hidden" name="id" value="<?= $pet['id'] ?>">
                                                <div class="mb-3">
                                                    <label for="nama_hewan" class="form-label">Nama Hewan</label>
                                                    <input type="text" class="form-control" name="nama_hewan" id="nama_hewan" value="<?= $pet['nama_hewan'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="user_id" class="form-label">Nama Pemilik</label>
                                                    <select class="form-control" name="user_id" id="user_id" required>
                                                        <option value="<?= $pet['user_id'] ?>">tidak ganti</option>
                                                        <?php
                                                        $sql = mysqli_query($koneksi, "SELECT * FROM owners");
                                                        while ($read = mysqli_fetch_assoc($sql)) {
                                                        ?>
                                                            <option value="<?= $read['id'] ?>"><?= $read['nama_lengkap'] . " - " . $read['email'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_hewan" class="form-label">Jenis Hewan</label>
                                                    <select name="jenis_hewan" id="jenis_hewan" class="form-control" required>
                                                        <option value="<?= $pet['jenis_hewan'] ?>">tidak ganti</option>
                                                        <option value="anjing">Anjing</option>
                                                        <option value="kucing">Kucing</option>
                                                    </select>
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
                        <div class="col-sm-12 col-md-2 m-1">
                            <form action="deletepets.php" method="post">
                                <input type="hidden" name="id" value="<?= $pet['id'] ?>" name="id">
                                <button type="submit" name="hapus" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data <?= $pet['nama_hewan'] ?>')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('../../template/admin/footer.php') ?>
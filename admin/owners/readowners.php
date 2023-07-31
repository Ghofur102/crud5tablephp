<?php include('../../template/admin/header.php') ?>
<div class="card container bg-light my-5" style="max-width: 1000px;">
    <div class="card-header text-center">
        <h4>CRUD Pemilik Hewan</h4>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemilik</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="createowners.php" method="post">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomer_telepon" class="form-label">Nomer Telepon</label>
                                <input type="number" class="form-control" name="nomer_ponsel" id="nomer_telepon" required>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomer Ponsel</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('../../koneksi.php');
                $sql_read = "SELECT * FROM owners";
                $reads = mysqli_query($koneksi, $sql_read);
                $number = 0;
                while ($read = mysqli_fetch_array($reads)) {
                ?>
                    <tr>
                        <th scope="row"><?= $number += 1 ?></th>
                        <td><?= $read['nama_lengkap'] ?></td>
                        <td><?= $read['email'] ?></td>
                        <td><?= $read['nomer_ponsel'] ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $read['email'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="edit<?= $read['email'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Pemilik</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="updateowners.php" method="post">
                                                <input type="hidden" value="<?= $read['id'] ?>" name="id">
                                                <div class="mb-3">
                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $read['nama_lengkap'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" value="<?= $read['email'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nomer_telepon" class="form-label">Nomer Telepon</label>
                                                    <input type="number" class="form-control" name="nomer_ponsel" id="nomer_telepon" value="<?= $read['nomer_ponsel'] ?>" required>
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="deleteowners.php" method="post">
                                <input type="hidden" name="id" value="<?= $read['id'] ?>">
                                <button type="submit" onclick="return confirm('Yakin mau menghapus data <?= $read['nama_lengkap'] ?>')" name="hapus" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('../../template/admin/footer.php') ?>
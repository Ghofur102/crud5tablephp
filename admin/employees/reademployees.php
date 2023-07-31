<?php
include('../../template/admin/header.php');
?>
<div class="card container mx-auto my-5" style="max-width: 1000px;">
    <div class="card-header text-center">
        <h4>CRUD Employees</h4>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalC">
            Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kepegawaian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="createemployees.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomer_kepegawaian" class="form-label">Nomer Kepegawaian</label>
                                <input type="number" name="nomer_kepegawaian" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value=""></option>
                                    <option value="petugas medis">Petugas Medis</option>
                                    <option value="perawat hewan">Perawat Hewan</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="marketing">Marketing</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gaji" class="form-label">Gaji</label>
                                <input type="number" name="gaji" id="gaji" class="form-control" min="1000000" max="100000000" required>
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
        <div class="row">
            <?php
            require('../../koneksi.php');
            $sql_read = mysqli_query($koneksi, "SELECT * FROM employees");
            while ($reads = mysqli_fetch_array($sql_read)) {
            ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card text-center">
                        <img src="img/<?= $reads['foto'] ?>" height="100px" alt="<?= $reads['foto'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $reads['nama_lengkap'] ?></h5>
                            <p class="card-text">
                                No Pegawai : <?= $reads['nomer_kepegawaian'] ?> <br>
                                Jabatan : <?= $reads['jabatan'] ?> <br>
                                Gaji : RP<?= number_format($reads['gaji'], 2, ',', '.') ?><br>
                            </p>
                            <div class="row mt-2">
                                <div class="col">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $reads['nomer_kepegawaian'] ?>">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $reads['nomer_kepegawaian'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Pegawai</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="updateemployees.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?= $reads['id'] ?>">
                                                        <div class="mb-3">
                                                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                            <input type="text" value="<?= $reads['nama_lengkap'] ?>" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="hidden" name="tidakGantiFoto" value="<?= $reads['foto'] ?>">
                                                            <label for="foto" class="form-label">Foto</label>
                                                            <input type="file" name="foto" id="foto" class="form-control">
                                                            <img src="img/<?= $reads['foto'] ?>" height="100px" alt="<?= $reads['foto'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nomer_kepegawaian" class="form-label">Nomer Kepegawaian</label>
                                                            <input type="number" value=<?= $reads['nomer_kepegawaian']  ?> name="nomer_kepegawaian" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jabatan" class="form-label">Jabatan</label>
                                                            <select name="jabatan" id="jabatan" class="form-control" required>
                                                                <option value="<?= $reads['jabatan'] ?>">tidak ganti</option>
                                                                <option value="petugas medis">Petugas Medis</option>
                                                                <option value="perawat hewan">Perawat Hewan</option>
                                                                <option value="keuangan">Keuangan</option>
                                                                <option value="marketing">Marketing</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="gaji" class="form-label">Gaji</label>
                                                            <input type="number" value=<?= $reads['gaji'] ?> name="gaji" id="gaji" class="form-control" min="1000000" max="100000000" required>
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
                                <div class="col">
                                    <form action="deleteemployees.php" method="post">
                                        <input type="hidden" name="foto" value="<?= $reads['foto'] ?>">
                                        <input type="hidden" name="id" value="<?= $reads['id'] ?>">
                                        <button type="submit" class="btn btn-danger" name="hapus" onclick="return confirm('Yakin mau menghapus data <?= $reads['nama_lengkap'] ?>')">Hapus</button>
                                    </form>
                                </div>
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
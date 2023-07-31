<?php
include('../../template/admin/header.php');
?>
<div class="card container mx-auto my-5" style="max-width: 800px;">
    <div class="card-header text-center">
        <h4>CRUD Stok</h4>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Stok</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="createstok.php" method="post">
                            <div class="mb-3">
                                <label for="merk" class="form-label">Nama Merk</label>
                                <input type="text" class="form-control" name="merk" id="merk" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Produk</label>
                                <select name="jenis" id="jenis" class="form-control" required>
                                    <option value=""></option>
                                    <option value="makanan anjing">Makanan Anjing</option>
                                    <option value="makanan kucing">Makanan Kucing</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Masuk *kg</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" required>
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
                    <th scope="col">Merk</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Jumlah *kg</th>
                    <th scope="col">Harga</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('../../koneksi.php');
                $sql_read = "SELECT * FROM stok";
                $number = 0;
                $reads = mysqli_query($koneksi, $sql_read);
                while ($read = mysqli_fetch_assoc($reads)) {
                ?>
                    <tr>
                        <th scope="row"><?= $number += 1 ?></th>
                        <td><?= $read['merk'] ?></td>
                        <td><?= $read['jenis'] ?></td>
                        <td><?= $read['jumlah'] ?></td>
                        <td>RP<?= number_format($read['harga'], 2, ',', '.') ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $read['id'] ?>">
                                Edit
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
                                            <form action="updatestok.php" method="post">
                                                <input type="hidden" name="id" value="<?= $read['id'] ?>">
                                                <div class="mb-3">
                                                    <label for="merk" class="form-label">Nama Merk</label>
                                                    <input type="text" class="form-control" name="merk" id="merk" value="<?= $read['merk'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis" class="form-label">Jenis Produk</label>
                                                    <select name="jenis" id="jenis" class="form-control" required>
                                                        <option value="<?= $read['jenis'] ?>">tidak ganti</option>
                                                        <option value="makanan anjing">Makanan Anjing</option>
                                                        <option value="makanan kucing">Makanan Kucing</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah" class="form-label">Jumlah Masuk *kg</label>
                                                    <input type="number" name="jumlah" id="jumlah" value="<?= $read['jumlah'] ?>" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" name="harga" id="harga" value="<?= $read['harga'] ?>" class="form-control" required>
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
                            <form action="deletestok.php" method="post">
                                <input type="hidden" name="id" value="<?= $read['id'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus stok ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include('../../template/admin/footer.php');
?>
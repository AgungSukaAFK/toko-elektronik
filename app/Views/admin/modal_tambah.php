<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between mb-3">
    <h3>Data Produk</h3>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah Produk
    </button>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Produk</th> <th>Kategori</th> <th>Harga</th>
            [cite_start]<th>Action [cite: 40]</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produk as $p) : ?>
        <tr>
            <td><img src="/uploads/<?= $p['thumbnail']; ?>" width="100"></td>
            <td><?= $p['produk']; ?></td>
            <td><?= $p['kategori']; ?></td>
            <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
            <td>
                <a href="/admin/produk/edit/<?= $p['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/admin/produk/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/produk/create" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori (Tipe)</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Contoh: Iphone 13 Pro" required>
                    </div>
                    <div class="mb-3">
                        <label>Produk (Merk)</label>
                        <input type="text" name="produk" class="form-control" placeholder="Contoh: Iphone" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between mb-3 align-items-center">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Produk</button>
    <a href="#" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="bg-light">
                <tr>
                    <th class="border-0">#</th>
                    <th class="border-0">Thumbnail</th>
                    <th class="border-0">Produk</th>
                    <th class="border-0">Kategori</th>
                    <th class="border-0">Harga</th>
                    <th class="border-0">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($produk as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="/uploads/<?= $p['thumbnail']; ?>" style="width: 60px; height: 60px; object-fit: contain; border:1px solid #ddd; border-radius:5px;"></td>
                    <td class="fw-bold"><?= $p['kategori']; ?> <br> <small class="text-muted"><?= $p['produk']; ?></small></td>
                    <td><span class="badge bg-secondary"><?= $p['produk']; ?></span></td>
                    <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="/admin/produk/edit/<?= $p['id']; ?>" class="text-primary text-decoration-none small">Edit</a> | 
                        <a href="/admin/produk/delete/<?= $p['id']; ?>" class="text-danger text-decoration-none small" onclick="return confirm('Yakin?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->include('admin/modal_tambah'); ?> 
<?= $this->endSection(); ?>
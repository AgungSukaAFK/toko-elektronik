<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between mb-3 align-items-center">
    <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-plus fa-sm text-white-50 me-1"></i> Tambah Produk
    </button>
    <a href="#" class="btn btn-sm btn-primary shadow-sm js-report-btn">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Produk Elektronik</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 ps-3">#</th>
                        <th class="border-0">Thumbnail</th>
                        <th class="border-0">Info Produk</th>
                        <th class="border-0">Kategori</th>
                        <th class="border-0">Harga</th>
                        <th class="border-0 pe-3 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($produk)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada data produk.</td></tr>
                    <?php else: ?>
                        <?php $i=1; foreach ($produk as $p) : ?>
                        <tr>
                            <td class="ps-3"><?= $i++; ?></td>
                            <td>
                                <img src="/uploads/<?= $p['thumbnail']; ?>" 
                                     class="rounded border" 
                                     style="width: 50px; height: 50px; object-fit: cover;"
                                     onclick="Swal.fire({imageUrl: '/uploads/<?= $p['thumbnail']; ?>', imageAlt: 'Preview'})">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= $p['produk']; ?></div>
                                <div class="small text-muted">ID: PROD-00<?= $p['id']; ?></div>
                            </td>
                            <td><span class="badge bg-secondary"><?= $p['kategori']; ?></span></td>
                            <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
                            <td class="pe-3 text-end">
                                <a href="/admin/produk/edit/<?= $p['id']; ?>" class="btn btn-warning btn-sm btn-circle" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/admin/produk/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Yakin hapus?')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/modal_tambah'); ?> 
<?= $this->endSection(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h3>Edit Produk</h3>
<form action="/admin/produk/update/<?= $produk['id']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="gambarLama" value="<?= $produk['thumbnail']; ?>">
    
    <div class="mb-3">
        <label>Thumbnail Saat Ini</label><br>
        <img src="/uploads/<?= $produk['thumbnail']; ?>" width="100" class="mb-2">
        <input type="file" name="thumbnail" class="form-control">
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?= $produk['kategori']; ?>">
    </div>
    <div class="mb-3">
        <label>Produk</label>
        <input type="text" name="produk" class="form-control" value="<?= $produk['produk']; ?>">
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="<?= $produk['harga']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/admin/produk" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection(); ?>
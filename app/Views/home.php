<!DOCTYPE html>
<html lang="en">
<head>
    <title>Toko Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">TOKO ELEKTRONIK</a>
            <a href="/login" class="btn btn-light btn-sm fw-bold text-primary">Login Admin</a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php foreach($produk as $p): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="/uploads/<?= $p['thumbnail']; ?>" class="card-img-top p-3" alt="..." style="height: 200px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['kategori']; ?></h5>
                        <p class="text-muted small mb-1"><?= $p['produk']; ?></p>
                        <h6 class="text-primary fw-bold">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></h6>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <button class="btn btn-outline-primary w-100 btn-sm">Beli Sekarang</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
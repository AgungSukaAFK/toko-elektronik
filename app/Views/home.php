<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); color: white; padding: 4rem 0; margin-bottom: 2rem; }
    </style>
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="fas fa-store me-2"></i>TOKO ELEKTRONIK</a>
            <div class="ms-auto">
                <a href="/login" class="btn btn-light btn-sm fw-bold text-primary px-3 shadow-sm">
                    <i class="fas fa-user-lock me-1"></i> Login Admin
                </a>
            </div>
        </div>
    </nav>

    <header class="hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Gadget Impian Anda</h1>
            <p class="lead">Temukan smartphone dan elektronik terbaik dengan harga termurah.</p>
        </div>
    </header>

    <div class="container mb-5">
        <div class="row">
            <?php foreach($produk as $p): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 hover-effect">
                    <div class="position-relative">
                        <img src="/uploads/<?= $p['thumbnail']; ?>" class="card-img-top p-3" alt="..." style="height: 220px; object-fit: contain;">
                        <span class="position-absolute top-0 end-0 badge bg-danger m-3">Diskon</span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-dark"><?= $p['kategori']; ?></h5>
                        <p class="text-muted small mb-2"><?= $p['produk']; ?></p>
                        <div class="mt-auto">
                            <h5 class="text-primary fw-bold mb-3">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></h5>
                            <button class="btn btn-outline-primary w-100 fw-bold js-btn-beli" 
                                    data-produk="<?= $p['kategori']; ?>">
                                <i class="fas fa-shopping-cart me-1"></i> Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="bg-white text-center py-4 border-top mt-auto">
        <small class="text-muted">Copyright &copy; Toko Elektronik 2026</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Script untuk tombol Beli
        document.querySelectorAll('.js-btn-beli').forEach(btn => {
            btn.addEventListener('click', function() {
                const namaProduk = this.getAttribute('data-produk');
                
                Swal.fire({
                    title: 'Masuk Keranjang!',
                    text: `Produk ${namaProduk} berhasil ditambahkan.`,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#4e73df',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Bayar Sekarang',
                    cancelButtonText: 'Lanjut Belanja'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Checkout',
                            'Anda akan diarahkan ke halaman pembayaran (Simulasi).',
                            'info'
                        )
                    }
                });
            });
        });
    </script>
</body>
</html>
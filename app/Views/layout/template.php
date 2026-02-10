<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SB Admin 2'; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #f8f9fc; overflow-x: hidden; }
        
        /* Sidebar Custom */
        .sidebar { background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%); min-height: 100vh; color: white; transition: all 0.3s; }
        .sidebar .nav-link { color: rgba(255,255,255,.8); padding: 1rem; display: block; text-decoration: none; display: flex; align-items: center; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; font-weight: 700; background-color: rgba(255,255,255,0.1); }
        .sidebar .brand { padding: 1.5rem 1rem; font-size: 1.2rem; font-weight: 800; text-transform: uppercase; text-align: center; color: white; text-decoration: none; display: block; letter-spacing: 0.05rem;}
        .sidebar hr { border-top: 1px solid rgba(255,255,255,.15); margin: 0 1rem 1rem; opacity: 1; }
        
        /* Topbar & Content */
        .main-content { width: 100%; display: flex; flex-direction: column; }
        .topbar { background-color: #fff; box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15); height: 4.375rem; display: flex; align-items: center; justify-content: space-between; padding: 0 1.5rem; }
        
        /* Utilities */
        .badge-counter { position: absolute; transform: scale(.7); transform-origin: top right; right: .25rem; margin-top: -.25rem; }
        .img-profile { height: 2rem; width: 2rem; object-fit: cover; }
        .cursor-pointer { cursor: pointer; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar d-flex flex-column p-0" style="width: 224px; flex-shrink: 0;">
            <a href="/admin" class="brand">
                <i class="fas fa-laugh-wink fa-2x rotate-n-15"></i> SB ADMIN <sup>2</sup>
            </a>
            <hr>
            <a href="/admin" class="nav-link <?= (uri_string() == 'admin') ? 'active' : '' ?>">
                <i class="fas fa-fw fa-tachometer-alt me-3"></i> Dashboard
            </a>
            <hr>
            <div style="padding-left:1rem; font-size:0.65rem; font-weight:800; opacity:0.6; text-transform:uppercase; margin-bottom: 5px;">Interface</div>
            <a href="/admin/produk" class="nav-link <?= (uri_string() == 'admin/produk') ? 'active' : '' ?>">
                <i class="fas fa-fw fa-box-open me-3"></i> Product
            </a>
            <a href="#" class="nav-link js-placeholder-link">
                <i class="fas fa-fw fa-chart-area me-3"></i> Charts
            </a>
            <a href="#" class="nav-link js-placeholder-link">
                <i class="fas fa-fw fa-table me-3"></i> Tables
            </a>

            <div class="mt-auto mb-3 px-3">
                <a href="/logout" class="btn btn-danger w-100 btn-sm">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </div>
        </div>

        <div class="main-content">
            <nav class="topbar mb-4">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search">
                        <button class="btn btn-primary js-search-btn" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>

                <ul class="navbar-nav ms-auto align-items-center">
                    
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle text-gray-600 js-alert-btn" href="#" role="button">
                            <i class="fas fa-bell fa-fw text-secondary"></i>
                            <span class="badge bg-danger badge-counter">3+</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle text-gray-600 js-message-btn" href="#" role="button">
                            <i class="fas fa-envelope fa-fw text-secondary"></i>
                            <span class="badge bg-danger badge-counter">7</span>
                        </a>
                    </li>

                    <div class="topbar-divider d-none d-sm-block border-end mx-2" style="height: 2rem;"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="mr-2 d-none d-lg-inline text-dark small me-2 fw-bold"><?= session()->get('username'); ?></span>
                            <img class="img-profile rounded-circle" src="/uploads/user.jpg" alt="User">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in">
                            <li><a class="dropdown-item js-profile-btn" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item js-settings-btn" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400 me-2"></i> Settings</a></li>
                            <li><a class="dropdown-item js-log-btn" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400 me-2"></i> Activity Log</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 me-2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Script Global untuk interaksi dummy
        document.addEventListener('DOMContentLoaded', function() {
            
            // Tombol Search
            const searchBtn = document.querySelector('.js-search-btn');
            if(searchBtn) {
                searchBtn.addEventListener('click', () => {
                    Swal.fire('Searching...', 'Fitur pencarian sedang dalam pengembangan.', 'info');
                });
            }

            // Tombol Notifikasi (Lonceng & Pesan)
            const alertBtns = document.querySelectorAll('.js-alert-btn, .js-message-btn');
            alertBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Tidak ada notifikasi baru',
                        text: 'Anda sudah membaca semua pesan.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                });
            });

            // Menu Profile Dummy
            const profileLinks = document.querySelectorAll('.js-profile-btn, .js-settings-btn, .js-log-btn');
            profileLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    Swal.fire('Akses Dibatasi', 'Anda tidak memiliki izin untuk mengubah pengaturan akun demo.', 'warning');
                });
            });

            // Sidebar Dummy Links
            const dummyLinks = document.querySelectorAll('.js-placeholder-link');
            dummyLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    Swal.fire('Coming Soon', 'Modul ini akan tersedia pada update berikutnya.', 'question');
                });
            });

            // Tombol Generate Report (Global Class)
            const reportBtns = document.querySelectorAll('.js-report-btn');
            reportBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    let timerInterval;
                    Swal.fire({
                        title: 'Generating Report...',
                        html: 'Mohon tunggu <b></b> milliseconds.',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const b = Swal.getHtmlContainer().querySelector('b');
                            timerInterval = setInterval(() => { b.textContent = Swal.getTimerLeft(); }, 100);
                        },
                        willClose: () => { clearInterval(timerInterval); }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            Swal.fire('Berhasil!', 'Laporan PDF telah didownload (Simulasi).', 'success');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
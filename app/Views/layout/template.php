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
        body { font-family: 'Nunito', sans-serif; background-color: #f8f9fc; }
        /* Sidebar Style SB Admin 2 */
        .sidebar { background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%); min-height: 100vh; color: white; }
        .sidebar .nav-link { color: rgba(255,255,255,.8); padding: 1rem; display: block; text-decoration: none; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; font-weight: 700; }
        .sidebar .brand { padding: 1.5rem 1rem; font-size: 1.2rem; font-weight: 800; text-transform: uppercase; text-align: center; color: white; text-decoration: none; display: block;}
        .sidebar hr { border-top: 1px solid rgba(255,255,255,.15); margin: 0 1rem 1rem; }
        
        /* Topbar */
        .topbar { background-color: #fff; box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15); height: 4.375rem; display: flex; align-items: center; justify-content: space-between; padding: 0 1.5rem; }
        .search-bar input { background-color: #f8f9fc; border: none; }
        
        /* Content */
        .main-content { width: 100%; }
        .container-fluid { padding: 1.5rem; }
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
                <i class="fas fa-fw fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <hr>
            <div style="padding-left:1rem; font-size:0.75rem; font-weight:800; opacity:0.6; text-transform:uppercase;">Interface</div>
            <a href="/admin/produk" class="nav-link <?= (uri_string() == 'admin/produk') ? 'active' : '' ?>">
                <i class="fas fa-fw fa-cog me-2"></i> Product
            </a>
            <a href="/logout" class="nav-link text-danger mt-auto mb-3">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>

        <div class="main-content">
            <nav class="topbar mb-4">
                <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
                <div class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small me-2"><?= session()->get('username'); ?></span>
                        <img class="img-profile rounded-circle" src="/uploads/user.jpg" style="height: 2rem; width: 2rem; object-fit: cover;">
                    </a>
                </div>
            </nav>

            <div class="container-fluid">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
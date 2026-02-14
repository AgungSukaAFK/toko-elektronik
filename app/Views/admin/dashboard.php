<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-primary border-4 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($totalProduk); ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-box fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-success border-4 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Nilai Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($totalNilaiProduk, 0, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-coins fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-info border-4 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rata-rata Harga</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($rataRataHarga, 0, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-calculator fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-warning border-4 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Harga Tertinggi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($hargaTertinggi, 0, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-arrow-up fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Harga Produk</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart" style="height: 320px; width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komposisi Nilai Produk</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart" style="height: 250px; width: 100%;"></canvas>
                </div>
                <div class="mt-4 text-center small" id="pieLegend"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    Chart.defaults.font.family = 'Nunito, -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.color = '#858796';

    const produkLabels = <?= json_encode($produkLabels); ?>;
    const produkHarga = <?= json_encode($produkHarga); ?>;

    const chartColors = [
        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#5a5c69', '#2e59d9', '#17a673', '#2c9faf'
    ];

    const borderColors = chartColors.map((color) => color);

    var ctxArea = document.getElementById("myAreaChart");
    new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: produkLabels,
            datasets: [{
                label: "Harga Produk",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: produkHarga,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: { padding: { left: 10, right: 25, top: 25, bottom: 0 } },
            scales: {
                x: { grid: { display: false, drawBorder: false } },
                y: {
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value) { return 'Rp ' + new Intl.NumberFormat('id-ID').format(value); }
                    },
                    grid: { color: "rgb(234, 236, 244)", zeroLineColor: "rgb(234, 236, 244)", drawBorder: false, borderDash: [2], zeroLineBorderDash: [2] }
                },
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyColor: "#858796",
                    titleMarginBottom: 10,
                    titleColor: '#6e707e',
                    titleFont: { size: 14 },
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                        }
                    }
                }
            }
        }
    });

    var ctxPie = document.getElementById("myPieChart");
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: produkLabels,
            datasets: [{
                data: produkHarga,
                backgroundColor: chartColors.slice(0, produkLabels.length),
                hoverBackgroundColor: chartColors.slice(0, produkLabels.length),
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                borderColor: borderColors.slice(0, produkLabels.length),
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                        }
                    }
                }
            },
            cutout: '70%',
        },
    });

    const pieLegend = document.getElementById('pieLegend');
    pieLegend.innerHTML = produkLabels.map((label, index) => `
        <span class="mr-2"><i class="fas fa-circle" style="color:${chartColors[index % chartColors.length]}"></i> ${label}</span>
    `).join(' ');
</script>
<?= $this->endSection(); ?>

<?php
$title = isset($title) ? $title : 'Dashboard Manager';
$active_menu = 'dashboard';
$additional_js = [
    'https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js'
];
$page_script = '
    loadTheme();
    const salesCtx = document.getElementById("salesTrendChart");
    if (salesCtx) {
        new Chart(salesCtx, {
            type: "line",
            data: {
                labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
                datasets: [{
                    label: "Penjualan (juta)",
                    data: [12.4, 11.8, 13.1, 14.0, 15.6, 16.8, 13.7],
                    borderColor: "#2563eb",
                    backgroundColor: "rgba(37,99,235,0.15)",
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: "#1d4ed8",
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: false, border: { display: false }, grid: { color: "#f1f5f9" }, ticks: { callback: function(value) { return "Rp" + value + " jt"; } } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    const paymentCtx = document.getElementById("paymentChannelChart");
    if (paymentCtx) {
        new Chart(paymentCtx, {
            type: "doughnut",
            data: {
                labels: ["QRIS", "Tunai", "Kartu Debit"],
                datasets: [{
                    data: [45, 32, 23],
                    backgroundColor: ["#2563eb", "#10b981", "#fbbf24"],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: "65%",
                plugins: { legend: { position: "bottom" } }
            }
        });
    }

    const userCtx = document.getElementById("userGrowthChart");
    if (userCtx) {
        new Chart(userCtx, {
            type: "bar",
            data: {
                labels: ["Nov", "Des", "Jan", "Feb", "Mar", "Apr"],
                datasets: [{
                    label: "User Aktif",
                    data: [120, 134, 156, 165, 172, 181],
                    backgroundColor: "#8b5cf6",
                    borderRadius: 8,
                    maxBarThickness: 32
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 20 }, grid: { color: "#f1f5f9" } },
                    x: { grid: { display: false } }
                }
            }
        });
    }
';
$this->load->view('inc/manager/header');
$this->load->view('inc/manager/navbar');
$this->load->view('inc/manager/sidebar');
?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard Manager</h1>
                        <p class="text-muted">Kontrol insight harian sampai tahunan untuk setiap cabang.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Rp12,4 jt</h3>
                                <p>Penjualan Harian</p>
                            </div>
                            <div class="icon"><i class="fas fa-calendar-day"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Rp71,3 jt</h3>
                                <p>Penjualan Mingguan</p>
                            </div>
                            <div class="icon"><i class="fas fa-calendar-week"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Rp288 jt</h3>
                                <p>Penjualan Bulanan</p>
                            </div>
                            <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>Rp3,1 M</h3>
                                <p>Penjualan Tahunan</p>
                            </div>
                            <div class="icon"><i class="fas fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <section class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Tren Penjualan 7 Hari</h3>
                                <div class="card-tools text-muted small">Update 30 menit lalu</div>
                            </div>
                            <div class="card-body">
                                <canvas id="salesTrendChart" height="160"></canvas>
                            </div>
                        </div>
                    </section>
                    <section class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i> Metode Pembayaran</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="paymentChannelChart" height="200"></canvas>
                                <ul class="list-group list-group-flush mt-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        QRIS <span class="badge badge-primary badge-pill">45%</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Tunai <span class="badge badge-success badge-pill">32%</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Kartu Debit <span class="badge badge-warning badge-pill">23%</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="row">
                    <section class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-users mr-1"></i> Pertumbuhan User Aktif</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="userGrowthChart" height="170"></canvas>
                            </div>
                        </div>
                    </section>
                    <section class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-shield-alt mr-1"></i> Kontrol Akses Manager</h3>
                            </div>
                            <div class="card-body">
                                <p>Manager meninjau data lintas cabang dan memberikan persetujuan strategis.</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Revisi stok & harga cabang</li>
                                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Override kuota promo regional</li>
                                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Generate laporan multi cabang</li>
                                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Kelola target & KPI team</li>
                                    <li class="mb-0"><i class="fas fa-check text-success mr-2"></i> Approve purchase order besar</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-file-invoice-dollar mr-1"></i> Laporan Periode</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Periode</th>
                                            <th>Nominal</th>
                                            <th>Vs Target</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Harian (24 Feb)</td>
                                            <td>Rp12.468.000</td>
                                            <td><span class="badge badge-success">+8%</span></td>
                                            <td><span class="badge badge-success">On Track</span></td>
                                        </tr>
                                        <tr>
                                            <td>Mingguan (Week 8)</td>
                                            <td>Rp71.325.000</td>
                                            <td><span class="badge badge-warning">-3%</span></td>
                                            <td><span class="badge badge-warning">Butuh Aksi</span></td>
                                        </tr>
                                        <tr>
                                            <td>Bulanan (Feb)</td>
                                            <td>Rp288.430.000</td>
                                            <td><span class="badge badge-success">+5%</span></td>
                                            <td><span class="badge badge-success">Healthy</span></td>
                                        </tr>
                                        <tr>
                                            <td>Tahunan (YTD)</td>
                                            <td>Rp3.102.780.000</td>
                                            <td><span class="badge badge-info">+12%</span></td>
                                            <td><span class="badge badge-info">Excellent</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('inc/manager/footer'); ?>

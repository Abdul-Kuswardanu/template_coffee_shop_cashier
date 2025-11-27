<?php
$title = 'AdminLTE - Coffee Shop Admin';
$active_menu = 'dashboard';
$additional_css = [];
$additional_js = ['https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js'];
$page_script = '
    const salesCtx = document.getElementById("salesTrendChart");
    if (salesCtx) {
        new Chart(salesCtx, {
            type: "line",
            data: {
                labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
                datasets: [{
                    label: "Pendapatan (juta)",
                    data: [9.8, 10.4, 11.2, 12.1, 12.8, 13.0, 12.4],
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
                    y: { beginAtZero: false, border: { display: false }, grid: { color: "#f1f5f9" } },
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
$this->load->view('inc/admin/header');
$this->load->view('inc/admin/navbar');
$this->load->view('inc/admin/sidebar');
?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard Admin</h1>
                        <p class="text-muted">Tampilan dummy dengan komponen AdminLTE.</p>
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
                                <h3>148</h3>
                                <p>Transaksi Hari Ini</p>
                            </div>
                            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Rp12,4 jt</h3>
                                <p>Pendapatan</p>
                            </div>
                            <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>326</h3>
                                <p>Produk Terjual</p>
                            </div>
                            <div class="icon"><i class="fas fa-box-open"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>7</h3>
                                <p>Produk Low Stock</p>
                            </div>
                            <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
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
                                <h3 class="card-title"><i class="fas fa-star mr-1"></i> Produk Terlaris</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2 align-items-center">
                                    <div>
                                        <strong>Cold Brew Bottle</strong>
                                        <p class="mb-0 text-muted">1.230 cup</p>
                                    </div>
                                    <span class="badge badge-success">+12%</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2 align-items-center">
                                    <div>
                                        <strong>Caramel Macchiato</strong>
                                        <p class="mb-0 text-muted">1.102 cup</p>
                                    </div>
                                    <span class="badge badge-success">+8%</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2 align-items-center">
                                    <div>
                                        <strong>Signature Latte</strong>
                                        <p class="mb-0 text-muted">984 cup</p>
                                    </div>
                                    <span class="badge badge-warning">+2%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Matcha Frappe</strong>
                                        <p class="mb-0 text-muted">861 cup</p>
                                    </div>
                                    <span class="badge badge-danger">-3%</span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('inc/admin/footer'); ?>

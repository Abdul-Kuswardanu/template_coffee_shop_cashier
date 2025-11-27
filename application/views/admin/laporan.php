<?php
$active_menu = 'laporan';
$laporanSlug = isset($laporan_tipe) ? $laporan_tipe : 'penjualan';
$additional_css = [
    'https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css'
];
$additional_js = [
    'https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js'
];

$laporanMeta = [
    'penjualan' => [
        'label' => 'Penjualan',
        'subtitle' => 'Ringkasan transaksi kasir beserta metode pembayaran.',
        'hero_style' => 'background: linear-gradient(120deg,#0f172a,#1d4ed8); color:#e0f2ff;',
        'hero_stats' => [
            ['label' => 'Transaksi hari ini', 'value' => '148 struk'],
            ['label' => 'Pendapatan', 'value' => 'Rp12,4 jt'],
            ['label' => 'Metode favorit', 'value' => '62% QRIS']
        ],
        'summary_boxes' => [
            ['color' => 'bg-info', 'value' => '148', 'label' => 'Transaksi Hari Ini', 'icon' => 'fas fa-shopping-cart'],
            ['color' => 'bg-success', 'value' => 'Rp12,4 jt', 'label' => 'Pendapatan Hari Ini', 'icon' => 'fas fa-money-bill-wave'],
            ['color' => 'bg-warning', 'value' => 'Rp71,3 jt', 'label' => 'Pendapatan Mingguan', 'icon' => 'fas fa-chart-line'],
            ['color' => 'bg-danger', 'value' => 'Rp288 jt', 'label' => 'Pendapatan Bulanan', 'icon' => 'fas fa-calendar-alt'],
        ],
        'columns' => ['#', 'No. Invoice', 'Tanggal', 'Kasir', 'Customer', 'Total', 'Metode Bayar', 'Status'],
        'rows' => [
            ['no' => 1, 'ref' => 'INV/CS/2402/0881', 'tanggal' => '24 Feb 2025 - 09:21', 'kasir' => 'Rina Pramudita', 'customer' => 'Member Gold', 'total' => 'Rp98.000', 'metode' => ['QRIS', 'info'], 'status' => ['Lunas', 'success']],
            ['no' => 2, 'ref' => 'INV/CS/2402/0880', 'tanggal' => '24 Feb 2025 - 09:15', 'kasir' => 'Rina Pramudita', 'customer' => 'Walk-in', 'total' => 'Rp45.000', 'metode' => ['Tunai', 'success'], 'status' => ['Lunas', 'success']],
            ['no' => 3, 'ref' => 'INV/CS/2402/0879', 'tanggal' => '24 Feb 2025 - 09:08', 'kasir' => 'Rina Pramudita', 'customer' => 'Member Silver', 'total' => 'Rp152.000', 'metode' => ['Kartu Debit', 'warning'], 'status' => ['Lunas', 'success']],
            ['no' => 4, 'ref' => 'INV/CS/2402/0878', 'tanggal' => '24 Feb 2025 - 08:55', 'kasir' => 'Rina Pramudita', 'customer' => 'Member Gold', 'total' => 'Rp67.000', 'metode' => ['QRIS', 'info'], 'status' => ['Lunas', 'success']],
            ['no' => 5, 'ref' => 'INV/CS/2402/0877', 'tanggal' => '24 Feb 2025 - 08:42', 'kasir' => 'Rina Pramudita', 'customer' => 'Walk-in', 'total' => 'Rp30.000', 'metode' => ['Tunai', 'success'], 'status' => ['Lunas', 'success']],
        ],
        'tfoot' => ['label' => 'Total Pendapatan', 'value' => 'Rp392.000']
    ],
    'pembelian' => [
        'label' => 'Pembelian',
        'subtitle' => 'Monitoring purchase order ke supplier dan stok bahan.',
        'hero_style' => 'background: linear-gradient(120deg,#422006,#f97316); color:#fff7ed;',
        'hero_stats' => [
            ['label' => 'PO aktif', 'value' => '28 dokumen'],
            ['label' => 'Nilai minggu ini', 'value' => 'Rp87 jt'],
            ['label' => 'Supplier utama', 'value' => '4 vendor']
        ],
        'summary_boxes' => [
            ['color' => 'bg-primary', 'value' => '28', 'label' => 'PO Aktif', 'icon' => 'fas fa-file-invoice'],
            ['color' => 'bg-success', 'value' => 'Rp87 jt', 'label' => 'Pembelian Minggu Ini', 'icon' => 'fas fa-boxes'],
            ['color' => 'bg-warning', 'value' => 'Rp310 jt', 'label' => 'Pembelian Bulan Ini', 'icon' => 'fas fa-warehouse'],
            ['color' => 'bg-danger', 'value' => '5', 'label' => 'PO Jatuh Tempo', 'icon' => 'fas fa-exclamation-circle'],
        ],
        'columns' => ['#', 'No. PO', 'Tanggal', 'Supplier', 'Kategori', 'Nominal', 'Metode Bayar', 'Status'],
        'rows' => [
            ['no' => 1, 'ref' => 'PO/CS/2402/021', 'tanggal' => '24 Feb 2025', 'kasir' => 'Beans Supply Co', 'customer' => 'Green Beans', 'total' => 'Rp25.000.000', 'metode' => ['Transfer', 'primary'], 'status' => ['Diproses', 'warning']],
            ['no' => 2, 'ref' => 'PO/CS/2402/020', 'tanggal' => '23 Feb 2025', 'kasir' => 'Sweet Syrup ID', 'customer' => 'Sirup & Topping', 'total' => 'Rp11.500.000', 'metode' => ['Transfer', 'primary'], 'status' => ['Lunas', 'success']],
            ['no' => 3, 'ref' => 'PO/CS/2402/019', 'tanggal' => '22 Feb 2025', 'kasir' => 'Packaging Bros', 'customer' => 'Cup & Sleeve', 'total' => 'Rp7.800.000', 'metode' => ['Giro', 'secondary'], 'status' => ['Menunggu', 'warning']],
            ['no' => 4, 'ref' => 'PO/CS/2402/018', 'tanggal' => '21 Feb 2025', 'kasir' => 'Daily Dairy', 'customer' => 'Susu Segar', 'total' => 'Rp18.200.000', 'metode' => ['Transfer', 'primary'], 'status' => ['Lunas', 'success']],
            ['no' => 5, 'ref' => 'PO/CS/2402/017', 'tanggal' => '20 Feb 2025', 'kasir' => 'Device Rental', 'customer' => 'Peralatan', 'total' => 'Rp9.900.000', 'metode' => ['Termin', 'secondary'], 'status' => ['Termin 2', 'info']],
        ],
        'tfoot' => ['label' => 'Total Pengeluaran', 'value' => 'Rp72.400.000']
    ],
];

$current = $laporanMeta[$laporanSlug];
$navLinks = [
    ['slug' => 'penjualan', 'label' => 'Penjualan'],
    ['slug' => 'pembelian', 'label' => 'Pembelian']
];

$page_script = <<<JS
loadTheme();
var tableLaporan = $('#tableLaporan').DataTable({
    orderCellsTop: true,
    fixedHeader: true,
    lengthMenu: [[5,10,15,20,50,-1],[5,10,15,20,50,"Semua"]],
    pageLength: 10,
    language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data",
        infoFiltered: "(difilter dari _MAX_ total data)",
        zeroRecords: "Tidak ada data yang cocok",
        paginate: {
            first: "Pertama",
            last: "Terakhir",
            next: "Selanjutnya",
            previous: "Sebelumnya"
        }
    }
});

$('#tableLaporan thead tr.table-filters th').each(function(i) {
    $('input', this).on('keyup change', function() {
        if (tableLaporan.column(i).search() !== this.value) {
            tableLaporan.column(i).search(this.value).draw();
        }
    });
});
JS;

$this->load->view('inc/admin/header');
$this->load->view('inc/admin/navbar');
$this->load->view('inc/admin/sidebar');
?>
    <style>
        body { background: #f4f6f9; }
        .content-wrapper { padding: 20px 24px 40px; }
        .laporan-tabs {
            display: flex;
            gap: 10px;
        }
        .laporan-tabs a {
            border-radius: 999px;
            padding: 6px 18px;
            font-weight: 600;
        }
        .laporan-tabs a.active {
            box-shadow: 0 8px 20px rgba(59,130,246,0.25);
        }
        .laporan-hero {
            border-radius: 20px;
            padding: 24px;
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }
        .laporan-hero h3 { margin: 0 0 6px; }
        .laporan-hero p { margin: 0; opacity: 0.9; }
        .laporan-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(140px,1fr));
            gap: 12px;
            width: 100%;
            max-width: 540px;
        }
        .laporan-stats div {
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.35);
            padding: 12px;
            backdrop-filter: blur(6px);
        }
        .laporan-stats small {
            display: block;
            font-size: 0.8rem;
            opacity: 0.85;
        }
        .laporan-stats strong {
            font-size: 1.1rem;
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(15,23,42,0.08);
        }
        .card-header {
            border: none;
            padding: 1.25rem 1.75rem;
            border-bottom: 1px solid #eef2ff;
        }
        .card-body {
            padding: 1.5rem 1.75rem;
        }
        .table-filters th { padding-top: 12px !important; }
        .table-filters input {
            width: 100%;
            border: 1px solid #dbe1ea;
            border-radius: 10px;
            padding: 6px 10px;
            background: #f8fafc;
            font-size: 0.85rem;
            margin-bottom: 4px;
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan <?php echo $current['label']; ?></h1>
                        <p class="text-muted mb-0"><?php echo $current['subtitle']; ?></p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">Laporan</li>
                            <li class="breadcrumb-item active"><?php echo $current['label']; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid px-0">
                <div class="laporan-tabs mb-3">
                    <?php foreach ($navLinks as $nav): ?>
                        <a href="<?php echo site_url('admin/laporan/' . $nav['slug']); ?>" class="btn btn-sm <?php echo $laporanSlug === $nav['slug'] ? 'btn-primary active' : 'btn-outline-secondary'; ?>">
                            <?php echo $nav['label']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="laporan-hero" style="<?php echo $current['hero_style']; ?>">
                    <div>
                        <h3><?php echo $current['label']; ?> Overview</h3>
                        <p><?php echo $current['subtitle']; ?></p>
                    </div>
                    <div class="laporan-stats">
                        <?php foreach ($current['hero_stats'] as $stat): ?>
                            <div>
                                <small><?php echo $stat['label']; ?></small>
                                <strong><?php echo $stat['value']; ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($current['summary_boxes'] as $box): ?>
                        <div class="col-lg-3 col-6">
                            <div class="small-box <?php echo $box['color']; ?>">
                                <div class="inner">
                                    <h3><?php echo $box['value']; ?></h3>
                                    <p><?php echo $box['label']; ?></p>
                                </div>
                                <div class="icon"><i class="<?php echo $box['icon']; ?>"></i></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h3 class="card-title mb-0"><i class="fas fa-file-invoice-dollar mr-1"></i> Detail Laporan <?php echo $current['label']; ?></h3>
                        <div class="card-tools">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Harian</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Mingguan</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Bulanan</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Tahunan</button>
                            </div>
                            <button class="btn btn-sm btn-primary ml-2"><i class="fas fa-file-export"></i> Export Excel</button>
                            <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-print"></i> Cetak</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="tableLaporan" style="width:100%;">
                                <thead>
                                    <tr>
                                        <?php foreach ($current['columns'] as $col): ?>
                                            <th><?php echo $col; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr class="table-filters">
                                        <?php foreach ($current['columns'] as $col): ?>
                                            <th><input type="text" class="form-control form-control-sm" placeholder="<?php echo $col; ?>"></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($current['rows'] as $row): ?>
                                        <tr>
                                            <td><?php echo $row['no']; ?></td>
                                            <td><?php echo $row['ref']; ?></td>
                                            <td><?php echo $row['tanggal']; ?></td>
                                            <td><?php echo $row['kasir']; ?></td>
                                            <td><?php echo $row['customer']; ?></td>
                                            <td><?php echo $row['total']; ?></td>
                                            <td><span class="badge badge-<?php echo $row['metode'][1]; ?>"><?php echo $row['metode'][0]; ?></span></td>
                                            <td><span class="badge badge-<?php echo $row['status'][1]; ?>"><?php echo $row['status'][0]; ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right;"><?php echo $current['tfoot']['label']; ?>:</th>
                                        <th><?php echo $current['tfoot']['value']; ?></th>
                                        <th colspan="2"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i> Ringkasan Periode</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Harian (24 Feb)
                                        <span class="badge badge-primary badge-pill">Rp12.468.000</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Mingguan (Week 8)
                                        <span class="badge badge-success badge-pill">Rp71.325.000</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Bulanan (Feb)
                                        <span class="badge badge-warning badge-pill">Rp288.430.000</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Tahunan (YTD)
                                        <span class="badge badge-danger badge-pill">Rp3,1 Miliar</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-filter mr-1"></i> Filter Laporan</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label>Periode</label>
                                        <select class="form-control">
                                            <option>Hari Ini</option>
                                            <option>Minggu Ini</option>
                                            <option>Bulan Ini</option>
                                            <option>Tahun Ini</option>
                                            <option>Custom</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $laporanSlug === 'penjualan' ? 'Kasir' : 'Supplier'; ?></label>
                                        <select class="form-control">
                                            <?php if ($laporanSlug === 'penjualan'): ?>
                                                <option>Semua Kasir</option>
                                                <option>Rina Pramudita</option>
                                                <option>Bima Satriyo</option>
                                            <?php else: ?>
                                                <option>Semua Supplier</option>
                                                <option>Beans Supply Co</option>
                                                <option>Packaging Bros</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Metode</label>
                                        <select class="form-control">
                                            <?php if ($laporanSlug === 'penjualan'): ?>
                                                <option>Semua Metode</option>
                                                <option>Tunai</option>
                                                <option>QRIS</option>
                                                <option>Kartu Debit</option>
                                            <?php else: ?>
                                                <option>Semua Metode</option>
                                                <option>Transfer</option>
                                                <option>Giro</option>
                                                <option>Termin</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-search"></i> Filter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php $this->load->view('inc/admin/footer'); ?>


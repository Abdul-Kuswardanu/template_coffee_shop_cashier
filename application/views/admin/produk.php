<?php
$kategoriSlug = isset($produk_category) ? $produk_category : 'original';
$active_menu = 'produk';
$additional_css = [
    'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css',
    'https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css'
];
$additional_js = [
    'https://cdn.jsdelivr.net/npm/sweetalert2@11',
    'https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js'
];

$produkCategories = [
    'original' => [
        'label' => 'Original',
        'subtitle' => 'Signature espresso dan house blend untuk menu dasar coffee shop.',
        'hero_style' => 'background: linear-gradient(120deg,#0f172a,#312e81); color:#f8fafc;',
        'hero_stats' => [
            ['label' => 'SKU aktif', 'value' => '12'],
            ['label' => 'Harga rata-rata', 'value' => 'Rp28.000'],
            ['label' => 'Wajib restock', 'value' => '2 menu']
        ],
        'products' => [
            ['sku' => 'ORG-ESP', 'nama' => 'Espresso House Roast', 'kategori' => 'Original', 'harga' => 22000, 'stok' => 36, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'ORG-AMR', 'nama' => 'Americano Classic', 'kategori' => 'Original', 'harga' => 25000, 'stok' => 28, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'ORG-FLW', 'nama' => 'Flat White Velvet', 'kategori' => 'Original', 'harga' => 31000, 'stok' => 18, 'status' => 'Restock', 'badge' => 'warning'],
            ['sku' => 'ORG-CAP', 'nama' => 'Cappuccino Bold', 'kategori' => 'Original', 'harga' => 30000, 'stok' => 22, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'ORG-LAT', 'nama' => 'Latte Signature', 'kategori' => 'Original', 'harga' => 32000, 'stok' => 14, 'status' => 'Restock', 'badge' => 'warning'],
        ]
    ],
    'topping' => [
        'label' => 'Topping',
        'subtitle' => 'Sirup, jelly, dan crunchy topping untuk memperkaya menu kreatif.',
        'hero_style' => 'background: linear-gradient(120deg,#312e81,#a855f7); color:#fdf4ff;',
        'hero_stats' => [
            ['label' => 'Varian tersedia', 'value' => '9 topping'],
            ['label' => 'Ketersediaan', 'value' => '88% stok'],
            ['label' => 'Favorit', 'value' => 'Brown Sugar Jelly']
        ],
        'products' => [
            ['sku' => 'TOP-CRML', 'nama' => 'Caramel Syrup', 'kategori' => 'Sirup', 'harga' => 8000, 'stok' => 64, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'TOP-BRWN', 'nama' => 'Brown Sugar Jelly', 'kategori' => 'Jelly', 'harga' => 9000, 'stok' => 42, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'TOP-CRMY', 'nama' => 'Cream Cheese Foam', 'kategori' => 'Foam', 'harga' => 11000, 'stok' => 15, 'status' => 'Restock', 'badge' => 'warning'],
            ['sku' => 'TOP-CRMK', 'nama' => 'Cookie Crumble', 'kategori' => 'Crunch', 'harga' => 7000, 'stok' => 9, 'status' => 'Menipis', 'badge' => 'danger'],
            ['sku' => 'TOP-MSHM', 'nama' => 'Mini Marshmallow', 'kategori' => 'Topping', 'harga' => 6000, 'stok' => 31, 'status' => 'Aktif', 'badge' => 'success'],
        ]
    ],
    'extra' => [
        'label' => 'Extra',
        'subtitle' => 'Shot espresso tambahan dan pilihan susu alternatif.',
        'hero_style' => 'background: linear-gradient(120deg,#064e3b,#0ea5e9); color:#ecfeff;',
        'hero_stats' => [
            ['label' => 'Extra shot / hari', 'value' => '37'],
            ['label' => 'Susu alternatif', 'value' => '4 jenis'],
            ['label' => 'Upcharge rata-rata', 'value' => 'Rp8.500']
        ],
        'products' => [
            ['sku' => 'EXT-SHOT', 'nama' => 'Extra Espresso Shot', 'kategori' => 'Shot', 'harga' => 8000, 'stok' => 72, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'EXT-ALMD', 'nama' => 'Almond Milk', 'kategori' => 'Susu', 'harga' => 10000, 'stok' => 18, 'status' => 'Restock', 'badge' => 'warning'],
            ['sku' => 'EXT-OAT', 'nama' => 'Oat Milk', 'kategori' => 'Susu', 'harga' => 9000, 'stok' => 26, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'EXT-SYRP', 'nama' => 'Vanilla Bean Shot', 'kategori' => 'Sirup Premium', 'harga' => 9500, 'stok' => 33, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'EXT-WC', 'nama' => 'Whipped Cream Doppio', 'kategori' => 'Cream', 'harga' => 7000, 'stok' => 12, 'status' => 'Menipis', 'badge' => 'danger'],
        ]
    ],
    'lainnya' => [
        'label' => 'Lain-lain',
        'subtitle' => 'Merchandise, kemasan, dan perlengkapan pendukung operasional.',
        'hero_style' => 'background: linear-gradient(120deg,#7c2d12,#f97316); color:#fff7ed;',
        'hero_stats' => [
            ['label' => 'Merch aktif', 'value' => '6 item'],
            ['label' => 'Stok cup', 'value' => '1.200 pcs'],
            ['label' => 'Buffer stok', 'value' => '14 hari']
        ],
        'products' => [
            ['sku' => 'LNS-CUP12', 'nama' => 'Paper Cup 12oz', 'kategori' => 'Kemasan', 'harga' => 2500, 'stok' => 500, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'LNS-CUP16', 'nama' => 'Paper Cup 16oz', 'kategori' => 'Kemasan', 'harga' => 2800, 'stok' => 320, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'LNS-MER1', 'nama' => 'Tumbler Matte Black', 'kategori' => 'Merchandise', 'harga' => 95000, 'stok' => 22, 'status' => 'Restock', 'badge' => 'warning'],
            ['sku' => 'LNS-TOTE', 'nama' => 'Tote Bag Canvas', 'kategori' => 'Merchandise', 'harga' => 75000, 'stok' => 35, 'status' => 'Aktif', 'badge' => 'success'],
            ['sku' => 'LNS-GIFT', 'nama' => 'Gift Card 100K', 'kategori' => 'Voucher', 'harga' => 100000, 'stok' => 48, 'status' => 'Aktif', 'badge' => 'success'],
        ]
    ],
];

$currentCategory = $produkCategories[$kategoriSlug];
$categoryNav = array_map(function ($slug) use ($produkCategories, $kategoriSlug) {
    return [
        'slug' => $slug,
        'label' => $produkCategories[$slug]['label'],
        'active' => $slug === $kategoriSlug
    ];
}, array_keys($produkCategories));

$page_script = <<<JS
loadTheme();
var tableProduk = $("#tableProduk").DataTable({
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

$("#tableProduk thead tr.table-filters th").each(function(i) {
    $("input", this).on("keyup change", function() {
        if (tableProduk.column(i).search() !== this.value) {
            tableProduk.column(i).search(this.value).draw();
        }
    });
});

$("#btnSimpanProduk").on("click", function() {
    var form = $("#modalTambah form");
    var sku = form.find("[name='sku']").val();
    var nama = form.find("[name='nama']").val();
    var harga = form.find("[name='harga']").val();
    var stok = form.find("[name='stok']").val();

    if (!sku || !nama || !harga || !stok) {
        Swal.fire({icon:"error", title:"Lengkapi data!", text:"Harap isi SKU, nama, harga, dan stok."});
        return;
    }

    Swal.fire({
        icon:"success",
        title:"Berhasil!",
        text:"Produk " + nama + " ditambahkan (dummy).",
        timer:1800,
        showConfirmButton:false
    }).then(() => {
        $("#modalTambah").modal("hide");
        form[0].reset();
    });
});

$(".btn-view").on("click", function() {
    var btn = $(this);
    $("#detailSku").text(btn.data("sku"));
    $("#detailNama").text(btn.data("nama"));
    $("#detailKategori").text(btn.data("kategori"));
    $("#detailHarga").text("Rp" + parseInt(btn.data("harga")).toLocaleString("id-ID"));
    $("#detailStok").text(btn.data("stok"));
    $("#detailStatus").html('<span class="badge badge-' + btn.data("badge") + '">' + btn.data("status") + '</span>');
    $("#modalDetail").modal("show");
});

$(".btn-edit").on("click", function() {
    var btn = $(this);
    $("#editSku").val(btn.data("sku"));
    $("#editNama").val(btn.data("nama"));
    $("#editKategori").val(btn.data("kategori"));
    $("#editHarga").val(btn.data("harga"));
    $("#editStok").val(btn.data("stok"));
    $("#editStatus").val(btn.data("status"));
    $("#modalEdit").modal("show");
});

$("#btnUpdateProduk").on("click", function() {
    var nama = $("#editNama").val();
    if (!nama) {
        Swal.fire({icon:"error", title:"Nama wajib diisi!"});
        return;
    }
    Swal.fire({
        icon:"success",
        title:"Perubahan tersimpan",
        text:"Produk " + nama + " berhasil diperbarui (dummy).",
        timer:1800,
        showConfirmButton:false
    }).then(() => $("#modalEdit").modal("hide"));
});

$(".btn-delete").on("click", function() {
    var btn = $(this);
    Swal.fire({
        title:"Hapus produk?",
        text:"Produk " + btn.data("nama") + " akan dihapus secara permanen (dummy).",
        icon:"warning",
        showCancelButton:true,
        confirmButtonText:"Ya, hapus!",
        cancelButtonText:"Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({icon:"success", title:"Dihapus!", text:"Produk berhasil dihapus.", timer:1800, showConfirmButton:false});
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
        .category-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .category-tabs a {
            border-radius: 999px;
            padding: 6px 18px;
            font-weight: 600;
        }
        .category-tabs a.active {
            box-shadow: 0 8px 20px rgba(59,130,246,0.25);
        }
        .category-hero {
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }
        .category-hero h3 {
            margin: 0 0 6px;
        }
        .category-hero p {
            margin: 0;
            opacity: 0.9;
        }
        .hero-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 12px;
            width: 100%;
            max-width: 520px;
        }
        .hero-stats div {
            backdrop-filter: blur(6px);
            border-radius: 14px;
            padding: 12px;
            border: 1px solid rgba(255,255,255,0.25);
        }
        .hero-stats small {
            display: block;
            font-size: 0.8rem;
            opacity: 0.8;
        }
        .hero-stats strong {
            font-size: 1.15rem;
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
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 10px;
            border: 1px solid #dbe1ea;
        }
        .dataTables_wrapper .row {
            margin-bottom: 0.35rem;
        }
        .dataTables_wrapper .row:last-child {
            margin-bottom: 0;
            margin-top: 0.75rem;
        }
        .info-points {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
            gap: 16px;
            margin-bottom: 16px;
        }
        .info-points .info-box {
            border-radius: 16px;
            border: 1px solid #eef2ff;
            padding: 16px;
            background: #fff;
            box-shadow: 0 10px 25px rgba(15,23,42,0.08);
        }
        .info-box strong {
            display: block;
            font-size: 1.3rem;
            margin-bottom: 4px;
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola Produk • <?php echo $currentCategory['label']; ?></h1>
                        <p class="text-muted mb-0">Atur katalog berdasarkan kategori agar preview tampilan berbeda.</p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">Kelola Produk</li>
                            <li class="breadcrumb-item active"><?php echo $currentCategory['label']; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid px-0">
                <div class="category-tabs mb-3">
                    <?php foreach ($categoryNav as $nav): ?>
                        <a href="<?php echo site_url('admin/produk/' . $nav['slug']); ?>" class="btn btn-sm <?php echo $nav['active'] ? 'btn-primary active' : 'btn-outline-secondary'; ?>">
                            <?php echo $nav['label']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="category-hero" style="<?php echo $currentCategory['hero_style']; ?>">
                    <div>
                        <h3><?php echo $currentCategory['label']; ?> Series</h3>
                        <p><?php echo $currentCategory['subtitle']; ?></p>
                    </div>
                    <div class="hero-stats">
                        <?php foreach ($currentCategory['hero_stats'] as $stat): ?>
                            <div>
                                <small><?php echo $stat['label']; ?></small>
                                <strong><?php echo $stat['value']; ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="info-points">
                    <div class="info-box">
                        <strong><?php echo count($currentCategory['products']); ?> SKU</strong>
                        <span>Terdata di kategori ini.</span>
                    </div>
                    <div class="info-box">
                        <strong>Filter Excel</strong>
                        <span>Gunakan filter per kolom seperti tabel Excel.</span>
                    </div>
                    <div class="info-box">
                        <strong>Import Draft</strong>
                        <span>Siapkan CSV sesuai template untuk mock import.</span>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h3 class="card-title mb-0"><i class="fas fa-coffee mr-1"></i> Daftar Produk <?php echo $currentCategory['label']; ?></h3>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
                                <i class="fas fa-plus"></i> Tambah Produk
                            </button>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-file-export"></i> Import CSV
                            </button>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-print"></i> Cetak Katalog
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableProduk" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SKU</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th style="width:150px;">Aksi</th>
                                    </tr>
                                    <tr class="table-filters">
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Cari #"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Cari SKU"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Cari Nama"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Kategori"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Harga"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Stok"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Status"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($currentCategory['products'] as $index => $product): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $product['sku']; ?></td>
                                            <td><?php echo $product['nama']; ?></td>
                                            <td><span class="badge badge-info"><?php echo $product['kategori']; ?></span></td>
                                            <td><?php echo 'Rp' . number_format($product['harga'], 0, ',', '.'); ?></td>
                                            <td><?php echo $product['stok']; ?></td>
                                            <td><span class="badge badge-<?php echo $product['badge']; ?>"><?php echo $product['status']; ?></span></td>
                                            <td>
                                                <button
                                                    class="btn btn-sm btn-info btn-view"
                                                    data-sku="<?php echo $product['sku']; ?>"
                                                    data-nama="<?php echo $product['nama']; ?>"
                                                    data-kategori="<?php echo $product['kategori']; ?>"
                                                    data-harga="<?php echo $product['harga']; ?>"
                                                    data-stok="<?php echo $product['stok']; ?>"
                                                    data-status="<?php echo $product['status']; ?>"
                                                    data-badge="<?php echo $product['badge']; ?>"
                                                >
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-warning btn-edit"
                                                    data-sku="<?php echo $product['sku']; ?>"
                                                    data-nama="<?php echo $product['nama']; ?>"
                                                    data-kategori="<?php echo $product['kategori']; ?>"
                                                    data-harga="<?php echo $product['harga']; ?>"
                                                    data-stok="<?php echo $product['stok']; ?>"
                                                    data-status="<?php echo $product['status']; ?>"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-danger btn-delete"
                                                    data-sku="<?php echo $product['sku']; ?>"
                                                    data-nama="<?php echo $product['nama']; ?>"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk <?php echo $currentCategory['label']; ?></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" name="sku" placeholder="ORG-001">
                    </div>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                            <?php foreach ($produkCategories as $slug => $meta): ?>
                                <option value="<?php echo $meta['label']; ?>" <?php echo $slug === $kategoriSlug ? 'selected' : ''; ?>>
                                    <?php echo $meta['label']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="30000">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="25">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSimpanProduk">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Produk -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk <?php echo $currentCategory['label']; ?></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditProduk">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" id="editSku" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" id="editNama" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" id="editKategori" required>
                            <?php foreach ($produkCategories as $meta): ?>
                                <option value="<?php echo $meta['label']; ?>"><?php echo $meta['label']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" id="editHarga" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" id="editStok" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="editStatus" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Restock">Restock</option>
                            <option value="Menipis">Menipis</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnUpdateProduk">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Produk -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">SKU</th>
                        <td id="detailSku">-</td>
                    </tr>
                    <tr>
                        <th>Nama Produk</th>
                        <td id="detailNama">-</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td id="detailKategori">-</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td id="detailHarga">-</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td id="detailStok">-</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td id="detailStatus">-</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('inc/admin/footer'); ?>


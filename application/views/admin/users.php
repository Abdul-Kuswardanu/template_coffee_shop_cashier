<?php
$active_menu = 'users';
$roleFilter = isset($user_role_filter) ? $user_role_filter : 'semua';
$user_role_filter = $roleFilter;
$additional_css = [
    'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css',
    'https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css'
];
$additional_js = [
    'https://cdn.jsdelivr.net/npm/sweetalert2@11',
    'https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js'
];

$roleMeta = [
    'semua' => [
        'label' => 'Semua User',
        'subtitle' => 'Gabungkan Admin, Kasir, dan Customer untuk audit cepat.',
        'hero_style' => 'background: linear-gradient(120deg,#0f172a,#2563eb); color:#e0f2ff;',
        'hero_stats' => [
            ['label' => 'Total akun', 'value' => '15 user'],
            ['label' => 'Aktif sekarang', 'value' => '12 user'],
            ['label' => 'Perlu tindakan', 'value' => '3 user']
        ]
    ],
    'admin' => [
        'label' => 'Admin',
        'subtitle' => 'Kontrol penuh akses sistem, pantau status admin.',
        'hero_style' => 'background: linear-gradient(120deg,#1d1a4e,#9333ea); color:#f5f3ff;',
        'hero_stats' => [
            ['label' => 'Admin aktif', 'value' => '3 user'],
            ['label' => 'Hak penuh', 'value' => '100%'],
            ['label' => 'Perlu review', 'value' => '0 user']
        ]
    ],
    'kasir' => [
        'label' => 'Kasir',
        'subtitle' => 'Tim frontliner yang menjalankan POS kasir.',
        'hero_style' => 'background: linear-gradient(120deg,#0d9488,#22d3ee); color:#ecfeff;',
        'hero_stats' => [
            ['label' => 'Kasir aktif', 'value' => '5 user'],
            ['label' => 'Shift hari ini', 'value' => '3 user'],
            ['label' => 'Butuh pelatihan', 'value' => '1 user']
        ]
    ],
    'customer' => [
        'label' => 'Customer',
        'subtitle' => 'Program loyalti dengan poin dan kontak pelanggan.',
        'hero_style' => 'background: linear-gradient(120deg,#78350f,#f97316); color:#fff7ed;',
        'hero_stats' => [
            ['label' => 'Member aktif', 'value' => '7 user'],
            ['label' => 'Poin beredar', 'value' => '4.200 poin'],
            ['label' => 'Member gold', 'value' => '2 user']
        ]
    ],
];

$currentRole = $roleMeta[$roleFilter];
$roleNav = [
    ['slug' => 'semua', 'label' => 'Semua User'],
    ['slug' => 'admin', 'label' => 'Admin'],
    ['slug' => 'kasir', 'label' => 'Kasir'],
    ['slug' => 'customer', 'label' => 'Customer'],
];

$roleFilterJs = json_encode($roleFilter);
$page_script = <<<JS
loadTheme();
var roleFilter = {$roleFilterJs};

var tableUsers = $("#tableUsers").DataTable({
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

$("#tableUsers thead tr.table-filters th").each(function(i) {
    $("input", this).on("keyup change", function() {
        if (tableUsers.column(i).search() !== this.value) {
            tableUsers.column(i).search(this.value).draw();
        }
    });
});

function toggleColumns(filter) {
    if (filter === "customer") {
        tableUsers.column(2).visible(false);
        tableUsers.column(4).visible(true);
        tableUsers.column(5).visible(false);
        tableUsers.column(6).visible(true);
        tableUsers.column(7).visible(false);
    } else {
        tableUsers.column(2).visible(true);
        tableUsers.column(4).visible(false);
        tableUsers.column(5).visible(true);
        tableUsers.column(6).visible(false);
        tableUsers.column(7).visible(true);
    }
}

var customerOnlyFilter = function(settings, data, dataIndex) {
    if (settings.nTable.id !== "tableUsers") return true;
    return $("#tableUsers tbody tr").eq(dataIndex).data("role") === "customer";
};

function setCustomerFilter(enable) {
    var filters = $.fn.dataTable.ext.search;
    var idx = filters.indexOf(customerOnlyFilter);
    if (idx !== -1) {
        filters.splice(idx, 1);
    }
    if (enable) {
        filters.push(customerOnlyFilter);
    }
}

function applyRoleFilter(filter) {
    tableUsers.search("");
    tableUsers.columns().search("");
    setCustomerFilter(false);

    if (filter === "customer") {
        setCustomerFilter(true);
    } else if (filter === "admin" || filter === "kasir") {
        var label = filter === "admin" ? "^Admin$" : "^Kasir$";
        tableUsers.column(5).search(label, true, false);
    }

    toggleColumns(filter);
    tableUsers.draw();
}

applyRoleFilter(roleFilter);

$("#btnSimpanUser").on("click", function() {
    var form = $("#modalTambah form");
    var nama = form.find("[name='nama']").val();
    var username = form.find("[name='username']").val();
    var email = form.find("[name='email']").val();
    var password = form.find("[name='password']").val();

    if (!nama || !username || !email || !password) {
        Swal.fire({icon:"error", title:"Lengkapi data!", text:"Nama, username, email, dan password wajib diisi."});
        return;
    }
    if (password.length < 8) {
        Swal.fire({icon:"error", title:"Password terlalu pendek", text:"Minimal 8 karakter."});
        return;
    }

    Swal.fire({icon:"success", title:"User ditambahkan!", text:"Data disimpan secara dummy.", timer:2000, showConfirmButton:false})
        .then(() => {
            $("#modalTambah").modal("hide");
            form[0].reset();
        });
});

$(".btn-view").on("click", function() {
    var btn = $(this);
    $("#detailNama").text(btn.data("nama"));
    $("#detailUsername").text(btn.data("username") || "-");
    $("#detailEmail").text(btn.data("email"));
    $("#detailTelepon").text(btn.data("telepon") || "-");
    $("#detailRole").html(btn.data("role") && btn.data("role") !== "Customer" ? '<span class="badge badge-primary">' + btn.data("role") + '</span>' : "-");
    $("#detailStatus").html(btn.data("status") ? '<span class="badge badge-' + (btn.data("status") === "Aktif" ? "success" : "warning") + '">' + btn.data("status") + '</span>' : "-");
    $("#detailPoin").html(btn.data("poin") ? '<span class="badge badge-info">' + btn.data("poin") + '</span>' : "-");
    $("#modalDetail").modal("show");
});

$(".btn-edit").on("click", function() {
    var btn = $(this);
    $("#editNama").val(btn.data("nama"));
    $("#editUsername").val(btn.data("username"));
    $("#editEmail").val(btn.data("email"));
    $("#editRole").val(btn.data("role"));
    $("#editStatus").val(btn.data("status"));
    $("#modalEdit").modal("show");
});

$("#btnUpdateUser").on("click", function() {
    var nama = $("#editNama").val();
    var email = $("#editEmail").val();
    if (!nama || !email) {
        Swal.fire({icon:"error", title:"Lengkapi data!", text:"Nama dan email wajib diisi."});
        return;
    }

    Swal.fire({icon:"success", title:"Perubahan tersimpan", text:"User " + nama + " berhasil diperbarui (dummy).", timer:2000, showConfirmButton:false})
        .then(() => $("#modalEdit").modal("hide"));
});

$(".btn-delete").on("click", function() {
    var btn = $(this);
    Swal.fire({
        title:"Hapus user?",
        text:"User " + btn.data("nama") + " akan dihapus (dummy).",
        icon:"warning",
        showCancelButton:true,
        confirmButtonText:"Ya, hapus",
        cancelButtonText:"Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({icon:"success", title:"Dihapus!", text:"User dihapus dari daftar (dummy).", timer:1800, showConfirmButton:false});
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
        .role-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .role-tabs a {
            border-radius: 999px;
            padding: 6px 18px;
            font-weight: 600;
        }
        .role-tabs a.active {
            box-shadow: 0 8px 20px rgba(37,99,235,0.25);
        }
        .role-hero {
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }
        .role-hero h3 {
            margin: 0 0 6px;
        }
        .role-hero p {
            margin: 0;
            opacity: 0.9;
        }
        .role-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(140px,1fr));
            gap: 12px;
            width: 100%;
            max-width: 540px;
        }
        .role-stats div {
            padding: 12px;
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.35);
            backdrop-filter: blur(5px);
        }
        .role-stats small {
            display: block;
            font-size: 0.8rem;
            opacity: 0.85;
        }
        .role-stats strong {
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
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola User • <?php echo $currentRole['label']; ?></h1>
                        <p class="text-muted mb-0">Filter berdasarkan role agar tampilannya berbeda.</p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">Kelola User</li>
                            <li class="breadcrumb-item active"><?php echo $currentRole['label']; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid px-0">
                <div class="role-tabs mb-3">
                    <?php foreach ($roleNav as $nav): ?>
                        <?php
                            $url = $nav['slug'] === 'semua'
                                ? site_url('admin/users')
                                : site_url('admin/users/' . $nav['slug']);
                        ?>
                        <a href="<?php echo $url; ?>" class="btn btn-sm <?php echo $roleFilter === $nav['slug'] ? 'btn-primary active' : 'btn-outline-secondary'; ?>">
                            <?php echo $nav['label']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="role-hero" style="<?php echo $currentRole['hero_style']; ?>">
                    <div>
                        <h3><?php echo $currentRole['label']; ?> Focus</h3>
                        <p><?php echo $currentRole['subtitle']; ?></p>
                    </div>
                    <div class="role-stats">
                        <?php foreach ($currentRole['hero_stats'] as $stat): ?>
                            <div>
                                <small><?php echo $stat['label']; ?></small>
                                <strong><?php echo $stat['value']; ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h3 class="card-title mb-0"><i class="fas fa-users mr-1"></i> Daftar <?php echo $currentRole['label']; ?></h3>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
                                <i class="fas fa-plus"></i> Tambah User
                            </button>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-file-download"></i> Unduh Akses
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="tableUsers" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Lengkap</th>
                                        <th class="col-username">Username</th>
                                        <th>Email</th>
                                        <th class="col-telepon">Telepon</th>
                                        <th class="col-role">Role</th>
                                        <th class="col-poin">Poin</th>
                                        <th class="col-status">Status</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                    <tr class="table-filters">
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Cari #"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Nama"></th>
                                        <th class="col-username"><input type="text" class="form-control form-control-sm" placeholder="Username"></th>
                                        <th><input type="text" class="form-control form-control-sm" placeholder="Email"></th>
                                        <th class="col-telepon"><input type="text" class="form-control form-control-sm" placeholder="Telepon"></th>
                                        <th class="col-role"><input type="text" class="form-control form-control-sm" placeholder="Role"></th>
                                        <th class="col-poin"><input type="text" class="form-control form-control-sm" placeholder="Poin"></th>
                                        <th class="col-status"><input type="text" class="form-control form-control-sm" placeholder="Status"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-role="kasir">
                                        <td>1</td>
                                        <td>Rina Pramudita</td>
                                        <td class="col-username">rina_kasir</td>
                                        <td>rina@coffeeshop.com</td>
                                        <td class="col-telepon">081234567890</td>
                                        <td class="col-role"><span class="badge badge-primary">Kasir</span></td>
                                        <td class="col-poin">-</td>
                                        <td class="col-status"><span class="badge badge-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-view" data-nama="Rina Pramudita" data-username="rina_kasir" data-email="rina@coffeeshop.com" data-telepon="081234567890" data-role="Kasir" data-status="Aktif" data-poin="">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning btn-edit" data-nama="Rina Pramudita" data-username="rina_kasir" data-email="rina@coffeeshop.com" data-telepon="081234567890" data-role="Kasir" data-status="Aktif" data-poin="">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-delete" data-username="rina_kasir" data-nama="Rina Pramudita">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-role="admin">
                                        <td>2</td>
                                        <td>Admin System</td>
                                        <td class="col-username">admin</td>
                                        <td>admin@coffeeshop.com</td>
                                        <td class="col-telepon">081234567891</td>
                                        <td class="col-role"><span class="badge badge-danger">Admin</span></td>
                                        <td class="col-poin">-</td>
                                        <td class="col-status"><span class="badge badge-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-view" data-nama="Admin System" data-username="admin" data-email="admin@coffeeshop.com" data-telepon="081234567891" data-role="Admin" data-status="Aktif" data-poin="">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning btn-edit" data-nama="Admin System" data-username="admin" data-email="admin@coffeeshop.com" data-telepon="081234567891" data-role="Admin" data-status="Aktif" data-poin="">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-delete" data-username="admin" data-nama="Admin System">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-role="customer">
                                        <td>3</td>
                                        <td>Budi Santoso</td>
                                        <td class="col-username">-</td>
                                        <td>budi@email.com</td>
                                        <td class="col-telepon">081234567892</td>
                                        <td class="col-role">-</td>
                                        <td class="col-poin"><span class="badge badge-info">1.250</span></td>
                                        <td class="col-status">-</td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-view" data-nama="Budi Santoso" data-username="" data-email="budi@email.com" data-telepon="081234567892" data-role="Customer" data-status="" data-poin="1250">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning btn-edit" data-nama="Budi Santoso" data-username="" data-email="budi@email.com" data-telepon="081234567892" data-role="Customer" data-status="" data-poin="1250">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-delete" data-username="" data-nama="Budi Santoso">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-role="customer">
                                        <td>4</td>
                                        <td>Sari Indah</td>
                                        <td class="col-username">-</td>
                                        <td>sari@email.com</td>
                                        <td class="col-telepon">081234567893</td>
                                        <td class="col-role">-</td>
                                        <td class="col-poin"><span class="badge badge-info">850</span></td>
                                        <td class="col-status">-</td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-view" data-nama="Sari Indah" data-username="" data-email="sari@email.com" data-telepon="081234567893" data-role="Customer" data-status="" data-poin="850">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning btn-edit" data-nama="Sari Indah" data-username="" data-email="sari@email.com" data-telepon="081234567893" data-role="Customer" data-status="" data-poin="850">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-delete" data-username="" data-nama="Sari Indah">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-role="customer">
                                        <td>5</td>
                                        <td>Andi Pratama</td>
                                        <td class="col-username">-</td>
                                        <td>andi@email.com</td>
                                        <td class="col-telepon">081234567894</td>
                                        <td class="col-role">-</td>
                                        <td class="col-poin"><span class="badge badge-info">2.100</span></td>
                                        <td class="col-status">-</td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-view" data-nama="Andi Pratama" data-username="" data-email="andi@email.com" data-telepon="081234567894" data-role="Customer" data-status="" data-poin="2100">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning btn-edit" data-nama="Andi Pratama" data-username="" data-email="andi@email.com" data-telepon="081234567894" data-role="Customer" data-status="" data-poin="2100">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-delete" data-username="" data-nama="Andi Pratama">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email@coffeeshop.com">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            <option>Kasir</option>
                            <option>Barista</option>
                            <option>Customer Support</option>
                            <option>Admin</option>
                            <option>Manager</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Minimal 8 karakter">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSimpanUser">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditUser">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="editNama" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="editUsername" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="editEmail" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" id="editRole" required>
                            <option value="Kasir">Kasir</option>
                            <option value="Barista">Barista</option>
                            <option value="Customer Support">Customer Support</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="editStatus" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                            <option value="Cuti">Cuti</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnUpdateUser">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail User -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Nama Lengkap</th>
                        <td id="detailNama">-</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td id="detailUsername">-</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="detailEmail">-</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td id="detailTelepon">-</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td id="detailRole">-</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td id="detailStatus">-</td>
                    </tr>
                    <tr>
                        <th>Poin</th>
                        <td id="detailPoin">-</td>
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


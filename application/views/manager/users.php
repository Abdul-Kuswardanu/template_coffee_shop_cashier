<?php
$active_menu = 'users';
$roleFilter = isset($user_role_filter) ? $user_role_filter : 'customer';
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
    'customer' => [
        'label' => 'Customer',
        'subtitle' => 'Pantau loyalti & kontak pelanggan.',
        'hero_style' => 'background: linear-gradient(120deg,#78350f,#f97316); color:#fff7ed;',
        'stats' => [
            ['label' => 'Member aktif', 'value' => '7 user'],
            ['label' => 'Poin beredar', 'value' => '4.200 poin'],
            ['label' => 'Upsell mingguan', 'value' => '18%']
        ]
    ],
    'kasir' => [
        'label' => 'Kasir',
        'subtitle' => 'Tim frontliner POS di setiap shift.',
        'hero_style' => 'background: linear-gradient(120deg,#0d9488,#22d3ee); color:#ecfeff;',
        'stats' => [
            ['label' => 'Kasir aktif', 'value' => '5 user'],
            ['label' => 'Shift hari ini', 'value' => '3 orang'],
            ['label' => 'Butuh pelatihan', 'value' => '1 orang']
        ]
    ],
];

$kasirUsers = [
    ['nama' => 'Rina Pramudita', 'username' => 'rina_kasir', 'email' => 'rina@coffeeshop.com', 'status' => 'Aktif'],
    ['nama' => 'Rayhan Saputra', 'username' => 'rayhan_pos', 'email' => 'rayhan@coffeeshop.com', 'status' => 'Aktif'],
    ['nama' => 'Nadia Rahma', 'username' => 'nadia.cashier', 'email' => 'nadia@coffeeshop.com', 'status' => 'Cuti'],
];

$customerUsers = [
    ['nama' => 'Budi Santoso', 'email' => 'budi@email.com', 'telepon' => '081234567892', 'poin' => '1.250'],
    ['nama' => 'Sari Indah', 'email' => 'sari@email.com', 'telepon' => '081234567893', 'poin' => '850'],
    ['nama' => 'Andi Pratama', 'email' => 'andi@email.com', 'telepon' => '081234567894', 'poin' => '2.100'],
    ['nama' => 'Lisa Hartono', 'email' => 'lisa@email.com', 'telepon' => '081234567895', 'poin' => '780'],
];

$currentRole = $roleMeta[$roleFilter];
$currentList = $roleFilter === 'kasir' ? $kasirUsers : $customerUsers;

$page_script = <<<JS
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

$("#btnSimpanUser").on("click", function() {
    var form = $("#modalTambah form");
    var nama = form.find("[name='nama']").val();
    var email = form.find("[name='email']").val();
    if (!nama || !email) {
        Swal.fire({ icon: "error", title: "Lengkapi data!", text: "Nama dan email wajib diisi." });
        return;
    }
    Swal.fire({ icon: "success", title: "User ditambahkan", text: "Data baru tersimpan (dummy).", timer: 2000, showConfirmButton: false })
        .then(() => {
            $("#modalTambah").modal("hide");
            form[0].reset();
        });
});

$(".btn-edit").on("click", function() {
    var btn = $(this);
    $("#editNama").val(btn.data("nama"));
    $("#editEmail").val(btn.data("email"));
    $("#editTelepon").val(btn.data("telepon") || "");
    $("#editUsername").val(btn.data("username") || "");
    $("#editRole").val(btn.data("role"));
    $("#editStatus").val(btn.data("status") || "Aktif");
    $("#modalEdit").modal("show");
});

$("#btnUpdateUser").on("click", function() {
    if (!$("#editNama").val() || !$("#editEmail").val()) {
        Swal.fire({ icon: "error", title: "Lengkapi data!", text: "Nama dan email wajib diisi." });
        return;
    }
    Swal.fire({ icon: "success", title: "Perubahan disimpan", timer: 1800, showConfirmButton: false })
        .then(() => $("#modalEdit").modal("hide"));
});

$(".btn-delete").on("click", function() {
    var name = $(this).data("nama");
    Swal.fire({
        title: "Hapus user?",
        text: "User " + name + " akan dihapus (dummy).",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({ icon: "success", title: "Dihapus!", timer: 1500, showConfirmButton: false });
        }
    });
});
JS;

$this->load->view('inc/manager/header');
$this->load->view('inc/manager/navbar');
$this->load->view('inc/manager/sidebar');
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
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 16px;
        }
        .role-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(140px,1fr));
            gap: 12px;
            max-width: 480px;
            width: 100%;
        }
        .role-stats div {
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.35);
            padding: 12px;
            backdrop-filter: blur(6px);
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
        .table-filters input {
            width: 100%;
            border-radius: 10px;
            border: 1px solid #dbe1ea;
            padding: 6px 10px;
            background: #f8fafc;
            font-size: 0.85rem;
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola User • <?php echo $currentRole['label']; ?></h1>
                        <p class="text-muted mb-0"><?php echo $currentRole['subtitle']; ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid px-0">
                <div class="role-tabs mb-3">
                    <a href="<?php echo site_url('manager/users/customer'); ?>" class="btn btn-sm <?php echo $roleFilter === 'customer' ? 'btn-primary active' : 'btn-outline-secondary'; ?>">Customer</a>
                    <a href="<?php echo site_url('manager/users/kasir'); ?>" class="btn btn-sm <?php echo $roleFilter === 'kasir' ? 'btn-primary active' : 'btn-outline-secondary'; ?>">Kasir</a>
                </div>

                <div class="role-hero" style="<?php echo $currentRole['hero_style']; ?>">
                    <div>
                        <h3><?php echo $currentRole['label']; ?> Focus</h3>
                        <p><?php echo $currentRole['subtitle']; ?></p>
                    </div>
                    <div class="role-stats">
                        <?php foreach ($currentRole['stats'] as $stat): ?>
                            <div>
                                <small><?php echo $stat['label']; ?></small>
                                <strong><?php echo $stat['value']; ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="card mt-4">
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
                                    <?php if ($roleFilter === 'kasir'): ?>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th style="width: 150px">Aksi</th>
                                        </tr>
                                        <tr class="table-filters">
                                            <th><input type="text" placeholder="#"></th>
                                            <th><input type="text" placeholder="Nama"></th>
                                            <th><input type="text" placeholder="Username"></th>
                                            <th><input type="text" placeholder="Email"></th>
                                            <th><input type="text" placeholder="Status"></th>
                                            <th></th>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Poin</th>
                                            <th style="width: 150px">Aksi</th>
                                        </tr>
                                        <tr class="table-filters">
                                            <th><input type="text" placeholder="#"></th>
                                            <th><input type="text" placeholder="Nama"></th>
                                            <th><input type="text" placeholder="Email"></th>
                                            <th><input type="text" placeholder="Telepon"></th>
                                            <th><input type="text" placeholder="Poin"></th>
                                            <th></th>
                                        </tr>
                                    <?php endif; ?>
                                </thead>
                                <tbody>
                                    <?php foreach ($currentList as $index => $row): ?>
                                        <?php if ($roleFilter === 'kasir'): ?>
                                            <tr data-role="kasir">
                                                <td><?php echo $index + 1; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><span class="badge badge-<?php echo $row['status'] === 'Aktif' ? 'success' : 'warning'; ?>"><?php echo $row['status']; ?></span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-info btn-edit"
                                                        data-role="Kasir"
                                                        data-nama="<?php echo $row['nama']; ?>"
                                                        data-username="<?php echo $row['username']; ?>"
                                                        data-email="<?php echo $row['email']; ?>"
                                                        data-status="<?php echo $row['status']; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger btn-delete" data-nama="<?php echo $row['nama']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <tr data-role="customer">
                                                <td><?php echo $index + 1; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['telepon']; ?></td>
                                                <td><span class="badge badge-info"><?php echo $row['poin']; ?></span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-info btn-edit"
                                                        data-role="Customer"
                                                        data-nama="<?php echo $row['nama']; ?>"
                                                        data-email="<?php echo $row['email']; ?>"
                                                        data-telepon="<?php echo $row['telepon']; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger btn-delete" data-nama="<?php echo $row['nama']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email@coffeeshop.com">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telepon" placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label>Username (untuk Kasir)</label>
                        <input type="text" class="form-control" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            <option value="Customer" <?php echo $roleFilter === 'customer' ? 'selected' : ''; ?>>Customer</option>
                            <option value="Kasir" <?php echo $roleFilter === 'kasir' ? 'selected' : ''; ?>>Kasir</option>
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
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="editNama" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="editEmail" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" id="editTelepon">
                    </div>
                    <div class="form-group">
                        <label>Username (Kasir)</label>
                        <input type="text" class="form-control" id="editUsername">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" id="editRole">
                            <option value="Customer">Customer</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status (Kasir)</label>
                        <select class="form-control" id="editStatus">
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

<?php $this->load->view('inc/manager/footer', compact('additional_css', 'additional_js', 'page_script')); ?>


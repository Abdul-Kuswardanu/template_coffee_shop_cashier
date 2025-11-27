<?php
$title = 'Profil Saya - AdminLTE';
$active_menu = 'profil';
$additional_css = ['https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css'];
$additional_js = ['https://cdn.jsdelivr.net/npm/sweetalert2@11'];
$page_script = '
    loadTheme();
    $("#formProfil").on("submit", function(e) {
        e.preventDefault();
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Profil berhasil diperbarui.",
            timer: 2000,
            showConfirmButton: false
        });
    });

    $("#formPassword").on("submit", function(e) {
        e.preventDefault();
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Password berhasil diubah.",
            timer: 2000,
            showConfirmButton: false
        });
    });
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
                        <h1>Profil Saya</h1>
                        <p class="text-muted">Kelola informasi profil dan ganti password akun Anda.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-edit mr-1"></i> Edit Profil</h3>
                            </div>
                            <div class="card-body">
                                <form id="formProfil">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" value="Admin Coffee Shop" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="admin@coffeeshop.com" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" class="form-control" value="081234567890" placeholder="No. Telepon">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows="3" placeholder="Alamat">Jl. Coffee Shop No. 123, Jakarta</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-lock mr-1"></i> Ganti Password</h3>
                            </div>
                            <div class="card-body">
                                <form id="formPassword">
                                    <div class="form-group">
                                        <label>Password Lama</label>
                                        <input type="password" class="form-control" placeholder="Password Lama">
                                    </div>
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" placeholder="Password Baru">
                                    </div>
                                    <div class="form-group">
                                        <label>Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" placeholder="Konfirmasi Password Baru">
                                    </div>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-key mr-1"></i> Ganti Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('inc/admin/footer'); ?>

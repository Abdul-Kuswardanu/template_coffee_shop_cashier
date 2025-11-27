<?php
$title = 'Pengaturan Sistem - AdminLTE';
$active_menu = 'pengaturan';
$additional_css = ['https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css'];
$additional_js = ['https://cdn.jsdelivr.net/npm/sweetalert2@11'];
$page_script = '
    function setTheme(theme) {
        if (theme === "dark") {
            $("body").addClass("dark-mode");
            localStorage.setItem("theme", "dark");
        } else {
            $("body").removeClass("dark-mode");
            localStorage.setItem("theme", "light");
        }
    }

    function loadTheme() {
        const savedTheme = localStorage.getItem("theme") || "light";
        setTheme(savedTheme);
        $(".theme-option").removeClass("active");
        $(".theme-option[data-theme=\'" + savedTheme + "\']").addClass("active");
    }

    loadTheme();

    $("#formSistem").on("submit", function(e) {
        e.preventDefault();
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Informasi sistem berhasil diperbarui.",
            timer: 2000,
            showConfirmButton: false
        });
    });

    $(".theme-option").on("click", function() {
        const theme = $(this).data("theme");
        setTheme(theme);
        $(".theme-option").removeClass("active");
        $(this).addClass("active");
    });
';
$this->load->view('inc/admin/header');
$this->load->view('inc/admin/navbar');
$this->load->view('inc/admin/sidebar');
?>

    <style>
        .theme-option {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }
        .theme-option:hover {
            border-color: #2563eb;
            transform: translateY(-2px);
        }
        .theme-option.active {
            border-color: #2563eb;
            background: rgba(37, 99, 235, 0.1);
        }
        .theme-icon {
            font-size: 3rem;
            margin-bottom: 10px;
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pengaturan</h1>
                        <p class="text-muted">Kelola preferensi tampilan dan pengaturan aplikasi.</p>
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
                                <h3 class="card-title"><i class="fas fa-info-circle mr-1"></i> Informasi Sistem</h3>
                            </div>
                            <div class="card-body">
                                <form id="formSistem">
                                    <div class="form-group">
                                        <label>Nama Sistem</label>
                                        <input type="text" class="form-control" value="Coffee Shop Management System" placeholder="Nama Sistem">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Sistem</label>
                                        <textarea class="form-control" rows="4" placeholder="Deskripsi Sistem">Sistem manajemen terintegrasi untuk mengelola operasional coffee shop, termasuk penjualan, inventori, laporan, dan manajemen customer dengan sistem poin loyalitas.</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Simpan Informasi Sistem
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-palette mr-1"></i> Tema Tampilan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="theme-option active" data-theme="light">
                                            <div class="theme-icon text-warning">
                                                <i class="fas fa-sun"></i>
                                            </div>
                                            <strong>Light Mode</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="theme-option" data-theme="dark">
                                            <div class="theme-icon text-dark">
                                                <i class="fas fa-moon"></i>
                                            </div>
                                            <strong>Dark Mode</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-cog mr-1"></i> Pengaturan Lainnya</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Bahasa</label>
                                    <select class="form-control">
                                        <option selected>Bahasa Indonesia</option>
                                        <option>English</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Zona Waktu</label>
                                    <select class="form-control">
                                        <option selected>WIB (UTC+7)</option>
                                        <option>WITA (UTC+8)</option>
                                        <option>WIT (UTC+9)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Format Tanggal</label>
                                    <select class="form-control">
                                        <option selected>DD/MM/YYYY</option>
                                        <option>MM/DD/YYYY</option>
                                        <option>YYYY-MM-DD</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Simpan Pengaturan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('inc/admin/footer'); ?>

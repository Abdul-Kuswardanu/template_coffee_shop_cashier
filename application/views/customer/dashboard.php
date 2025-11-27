<?php
$title = 'Customer Hub - Coffee Shop';
$this->load->view('inc/customer/header');
$this->load->view('inc/customer/navbar');
?>

    <section class="hero-section">
        <div class="container">
            <h1>Program Loyalty Coffee Shop</h1>
            <p>Kumpulkan poin setiap pembelian, nikmati reward eksklusif, dan cek struk digital Anda dengan mudah.</p>
            <button class="btn btn-primary-custom">Cek Poin Saya</button>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="points-display">
                        <h3>Poin Reward Anda</h3>
                        <div class="points-value">2.480</div>
                        <div class="tier-badge">Gold Member</div>
                        <div class="progress progress-custom mt-3">
                            <div class="progress-bar progress-bar-custom" style="width: 68%"></div>
                        </div>
                        <p class="mt-3">Butuh 1.520 poin lagi untuk mencapai Platinum Tier</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-custom">
                        <div class="card-body">
                            <h4 class="card-title mb-4"><i class="fas fa-gift text-warning"></i> Kupon & Benefit Aktif</h4>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <strong>Gratis 1 Latte</strong> setelah 10 pembelian (8/10)
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <strong>Diskon Ulang Tahun 25%</strong> (aktif 12 hari)
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <strong>Gratis Ongkir Delivery</strong> (2 kuota tersisa)
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <strong>Buy 1 Get 1</strong> setiap hari Senin
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="background: #fff;">
        <div class="container">
            <h2 class="text-center mb-5">Struk Digital Terbaru</h2>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <?php
                    $receipts = [
                        ['id' => 'INV/CS/2402/0881', 'date' => '24 Feb 2025 - 09:21', 'total' => 'Rp98.000', 'points' => '+98 poin', 'items' => '2x Latte, 1x Croissant'],
                        ['id' => 'INV/CS/2402/0734', 'date' => '22 Feb 2025 - 19:05', 'total' => 'Rp152.000', 'points' => '+152 poin', 'items' => '3x Caramel Macchiato, 2x Chocolate Cake'],
                        ['id' => 'INV/CS/2402/0610', 'date' => '20 Feb 2025 - 08:55', 'total' => 'Rp45.000', 'points' => '+45 poin', 'items' => '1x Americano, 1x Croissant'],
                    ];
                    foreach ($receipts as $receipt): ?>
                        <div class="receipt-card">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="mb-1"><?php echo $receipt['id']; ?></h5>
                                    <small class="text-muted"><?php echo $receipt['date']; ?></small>
                                </div>
                                <span class="badge badge-warning"><?php echo $receipt['points']; ?></span>
                            </div>
                            <p class="mb-2"><strong>Items:</strong> <?php echo $receipt['items']; ?></p>
                            <p class="mb-0"><strong>Total:</strong> <span class="text-primary"><?php echo $receipt['total']; ?></span></p>
                        </div>
                    <?php endforeach; ?>
                    <div class="text-center mt-4">
                        <button class="btn btn-secondary-custom">Lihat Semua Struk</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5">Kenapa Bergabung dengan Program Loyalty?</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-box">
                        <div class="icon-box mx-auto">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h5>Kumpulkan Poin</h5>
                        <p>Dapatkan 1 poin untuk setiap Rp1.000 pembelian Anda</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <div class="icon-box mx-auto">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h5>Reward Eksklusif</h5>
                        <p>Tukar poin dengan minuman gratis, diskon, dan benefit lainnya</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <div class="icon-box mx-auto">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5>Struk Digital</h5>
                        <p>Akses struk pembelian Anda kapan saja, di mana saja</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <div class="icon-box mx-auto">
                            <i class="fas fa-star"></i>
                        </div>
                        <h5>Tier Member</h5>
                        <p>Naikkan tier untuk mendapatkan benefit lebih banyak</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="background: #fff;">
        <div class="container">
            <h2 class="text-center mb-5">Pertanyaan yang Sering Diajukan</h2>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="faq-item">
                        <div class="faq-question">Bagaimana cara mendapatkan poin?</div>
                        <p>Anda akan mendapatkan 1 poin untuk setiap Rp1.000 pembelian. Poin akan otomatis terakumulasi setelah setiap transaksi.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Bagaimana cara menukar poin dengan reward?</div>
                        <p>Poin dapat ditukar langsung di kasir saat melakukan pembelian. Tersedia berbagai pilihan reward mulai dari minuman gratis hingga diskon khusus.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apakah poin memiliki masa berlaku?</div>
                        <p>Poin tidak memiliki masa berlaku, namun untuk menjaga status tier member, Anda perlu melakukan minimal 1 transaksi setiap 3 bulan.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Bagaimana cara melihat struk digital?</div>
                        <p>Struk digital dapat diakses langsung di halaman ini. Semua transaksi Anda akan tersimpan dan dapat diunduh kapan saja.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5">Apa Kata Mereka?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Program loyalty-nya sangat menguntungkan! Setiap pembelian dapat poin dan bisa ditukar minuman gratis."
                        </div>
                        <div class="testimonial-author">
                            <i class="fas fa-user-circle"></i> Budi Santoso
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Struk digital sangat praktis, tidak perlu khawatir struk hilang. Semua transaksi tersimpan rapi."
                        </div>
                        <div class="testimonial-author">
                            <i class="fas fa-user-circle"></i> Sari Indah
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Sebagai member Gold, saya dapat banyak benefit eksklusif. Worth it banget!"
                        </div>
                        <div class="testimonial-author">
                            <i class="fas fa-user-circle"></i> Andi Pratama
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-coffee"></i> Coffee Shop</h5>
                    <p>Platform terdepan untuk program loyalty dan manajemen customer coffee shop.</p>
                </div>
                <div class="col-md-4">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50">Tentang Kami</a></li>
                        <li><a href="#" class="text-white-50">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-white-50">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-white-50">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p class="text-white-50">
                        <i class="fas fa-envelope"></i> customer@coffeeshop.com<br>
                        <i class="fas fa-phone"></i> 0812-3456-7890
                    </p>
                </div>
            </div>
            <hr class="bg-white-50 my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Coffee Shop. All rights reserved.</p>
            </div>
        </div>
    </footer>

<?php $this->load->view('inc/customer/footer'); ?>

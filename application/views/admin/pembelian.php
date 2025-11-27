<?php
$title = 'Pembelian (POS) - AdminLTE';
$active_menu = 'pembelian';
$additional_css = [];
$page_script = '
    loadTheme();
';
$this->load->view('inc/admin/header');
$this->load->view('inc/admin/navbar');
$this->load->view('inc/admin/sidebar');
?>

    <style>
        body { background: #f4f6f9; }
        .content-wrapper { padding: 20px 24px 40px; }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(15,23,42,0.08);
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 18px;
            margin-top: 15px;
        }
        .product {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            background: #fff;
        }
        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.08);
        }
        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        .filters input, .filters select {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 14px;
            flex: 1;
            font-size: 0.95rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th { background: #f8fafc; }
        .payment-actions {
            display: grid;
            grid-template-columns: repeat(2, minmax(140px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }
        .payment-actions button {
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 600;
            cursor: pointer;
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pembelian (POS)</h1>
                        <p class="text-muted">Admin dapat berperan sebagai kasir untuk melakukan transaksi pembelian.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-coffee mr-1"></i> Produk Coffee Shop</h3>
                            </div>
                            <div class="card-body">
                                <div class="filters">
                                    <input type="search" placeholder="Cari produk..." class="form-control">
                                    <select class="form-control">
                                        <option>Semua Kategori</option>
                                        <option>Kopi</option>
                                        <option>Snack</option>
                                        <option>Seasonal</option>
                                    </select>
                                </div>
                                <div class="product-grid">
                                    <?php
                                    $products = [
                                        ['Espresso', 'Rp22.000'],
                                        ['Americano', 'Rp25.000'],
                                        ['Latte', 'Rp30.000'],
                                        ['Cappuccino', 'Rp29.000'],
                                        ['Mocha', 'Rp32.000'],
                                        ['Caramel Macchiato', 'Rp35.000'],
                                        ['Matcha Latte', 'Rp33.000'],
                                        ['Croissant', 'Rp18.000'],
                                        ['Chocolate Cake', 'Rp28.000'],
                                    ];
                                    foreach ($products as $item): ?>
                                        <div class="product">
                                            <p><strong><?php echo $item[0]; ?></strong></p>
                                            <p><?php echo $item[1]; ?></p>
                                            <button class="btn btn-primary btn-sm" style="width: 100%;">Tambah</button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-shopping-basket mr-1"></i> Keranjang Pembelian</h3>
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Latte</td>
                                            <td>2</td>
                                            <td>Rp60.000</td>
                                        </tr>
                                        <tr>
                                            <td>Croissant</td>
                                            <td>1</td>
                                            <td>Rp18.000</td>
                                        </tr>
                                        <tr>
                                            <td>Americano</td>
                                            <td>1</td>
                                            <td>Rp25.000</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="mt-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotal</span>
                                        <strong>Rp103.000</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Diskon (Member)</span>
                                        <strong>Rp5.000</strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span><strong>Total</strong></span>
                                        <strong>Rp98.000</strong>
                                    </div>
                                </div>

                                <h5 class="mt-3">Metode Pembayaran</h5>
                                <div class="payment-actions">
                                    <button class="btn btn-success">Tunai</button>
                                    <button class="btn btn-info">QRIS</button>
                                    <button class="btn btn-warning">Kartu Debit</button>
                                    <button class="btn btn-secondary">Split Bill</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('inc/admin/footer'); ?>

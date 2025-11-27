<?php
$products = [
    ['id' => 1, 'name' => 'Espresso', 'price' => 22000, 'category' => 'Original', 'tag' => 'Best Seller', 'stock' => 45],
    ['id' => 2, 'name' => 'Americano', 'price' => 25000, 'category' => 'Original', 'tag' => 'Dine-in', 'stock' => 38],
    ['id' => 3, 'name' => 'Latte Hazelnut', 'price' => 32000, 'category' => 'Signature', 'tag' => 'Favorit', 'stock' => 28],
    ['id' => 4, 'name' => 'Caramel Macchiato', 'price' => 35000, 'category' => 'Signature', 'tag' => 'Baru', 'stock' => 22],
    ['id' => 5, 'name' => 'Matcha Latte', 'price' => 33000, 'category' => 'Non Coffee', 'tag' => 'Popular', 'stock' => 31],
    ['id' => 6, 'name' => 'Croissant Butter', 'price' => 18000, 'category' => 'Snack', 'tag' => 'Fresh', 'stock' => 15],
    ['id' => 7, 'name' => 'Chocolate Cake', 'price' => 28000, 'category' => 'Snack', 'tag' => 'Slice', 'stock' => 8],
    ['id' => 8, 'name' => 'Affogato', 'price' => 36000, 'category' => 'Seasonal', 'tag' => 'Limited', 'stock' => 12],
    ['id' => 9, 'name' => 'Cold Brew Citrus', 'price' => 32000, 'category' => 'Seasonal', 'tag' => 'Summer', 'stock' => 19],
    ['id' => 10, 'name' => 'Tiramisu Latte', 'price' => 37000, 'category' => 'Signature', 'tag' => 'Series', 'stock' => 14],
    ['id' => 11, 'name' => 'Cappuccino', 'price' => 29000, 'category' => 'Original', 'tag' => 'Classic', 'stock' => 42],
    ['id' => 12, 'name' => 'Flat White', 'price' => 31000, 'category' => 'Original', 'tag' => 'Smooth', 'stock' => 26],
];

$categories = ['Semua Produk', 'Original', 'Signature', 'Non Coffee', 'Snack', 'Seasonal'];

$header_data = ['title' => isset($title) ? $title : 'Kasir POS'];
$this->load->view('inc/kasir/header', $header_data);
$this->load->view('inc/kasir/navbar');
?>

<div class="content-wrapper" style="padding: 32px 56px 48px; margin-left: 0 !important; width: 100% !important; max-width: 100% !important;">
<section class="kasir-status">
    <span><i class="fas fa-clock"></i> Shift <?php echo isset($shift) ? $shift : 'Pagi'; ?> • <?php echo isset($store) ? $store : 'Gerai #01'; ?></span>
    <span><i class="fas fa-user"></i> Kasir: <?php echo isset($kasir_name) ? $kasir_name : 'Rina Marlina'; ?></span>
    <span><i class="fas fa-calendar"></i> Tanggal: <?php echo isset($shift_date) ? $shift_date : '24 Februari 2025'; ?></span>
    <span><i class="fas fa-info-circle"></i> Mode: Dummy Preview</span>
</section>

<div class="kasir-grid">
    <section class="kasir-card">
        <div class="kasir-card__title">
            <h2><i class="fas fa-coffee"></i> Katalog Produk</h2>
            <p style="margin:0;color:#64748b;">Pilih kategori atau cari produk untuk menambah ke keranjang.</p>
        </div>
        <div class="kasir-filter">
            <input type="search" id="searchProduct" placeholder="Cari nama produk, contoh: latte signature">
            <select id="filterOutlet">
                <option>Semua Outlet</option>
                <option>Gerai #01 - Pusat</option>
                <option>Gerai #02 - Mall</option>
            </select>
        </div>
        <div class="kasir-categories">
            <?php foreach ($categories as $category): ?>
                <button type="button" class="btn-category <?php echo $category === 'Semua Produk' ? 'active' : ''; ?>" data-category="<?php echo $category; ?>">
                    <?php echo $category; ?>
                </button>
            <?php endforeach; ?>
        </div>
        <div class="kasir-products" id="productList">
            <?php foreach ($products as $item): ?>
                <article class="kasir-product" data-id="<?php echo $item['id']; ?>" data-name="<?php echo htmlspecialchars($item['name']); ?>" data-price="<?php echo $item['price']; ?>" data-category="<?php echo $item['category']; ?>">
                    <small><?php echo $item['category']; ?> • <?php echo $item['tag']; ?></small>
                    <strong><?php echo $item['name']; ?></strong>
                    <p style="margin:4px 0 8px;color:#475569;"><?php echo 'Rp' . number_format($item['price'], 0, ',', '.'); ?></p>
                    <small style="color:#94a3b8;">Stok: <?php echo $item['stock']; ?></small>
                    <button type="button" class="btn-add-product" data-id="<?php echo $item['id']; ?>">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <aside class="kasir-card kasir-order">
        <div>
            <h2><i class="fas fa-shopping-basket"></i> Keranjang Aktif</h2>
            <div class="kasir-cart" id="cartContainer">
                <div id="emptyCart" style="text-align:center;padding:40px;color:#94a3b8;">
                    <i class="fas fa-shopping-cart" style="font-size:3rem;margin-bottom:12px;opacity:0.3;"></i>
                    <p>Keranjang kosong. Pilih produk untuk memulai transaksi.</p>
                </div>
                <table id="cartTable" style="display:none;">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th style="text-align:center;">Qty</th>
                            <th style="text-align:right;">Subtotal</th>
                            <th style="width:40px;"></th>
                        </tr>
                    </thead>
                    <tbody id="cartBody">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="kasir-totals" id="totalsSection" style="display:none;">
            <div>
                <span>Subtotal</span>
                <span id="subtotal">Rp0</span>
            </div>
            <div>
                <span>Diskon Member</span>
                <span id="discount">-Rp0</span>
            </div>
            <div>
                <span>Total Bayar</span>
                <span id="grandTotal">Rp0</span>
            </div>
        </div>

        <div id="paymentSection" style="display:none;">
            <h3 style="margin-bottom:12px;"><i class="fas fa-credit-card"></i> Metode Pembayaran</h3>
            <div class="kasir-payment">
                <?php
                $payments = [
                    ['method' => 'Tunai', 'icon' => 'fa-money-bill-wave'],
                    ['method' => 'QRIS Static', 'icon' => 'fa-qrcode'],
                    ['method' => 'QRIS Dinamis', 'icon' => 'fa-qrcode'],
                    ['method' => 'Kartu Debit', 'icon' => 'fa-credit-card'],
                    ['method' => 'Split Bill', 'icon' => 'fa-divide']
                ];
                foreach ($payments as $idx => $payment): ?>
                    <button type="button" class="btn-payment-method <?php echo $idx === 1 ? 'active' : ''; ?>" data-method="<?php echo $payment['method']; ?>">
                        <i class="fas <?php echo $payment['icon']; ?>"></i><br>
                        <?php echo $payment['method']; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="kasir-actions-panel" id="actionButtons" style="display:none;">
            <button type="button" class="btn-cancel" id="btnCancel">
                <i class="fas fa-times"></i> Batalkan
            </button>
            <button type="button" class="btn-hold" id="btnHold">
                <i class="fas fa-pause"></i> Hold Pesanan
            </button>
            <button type="button" class="btn-pay" id="btnPay">
                <i class="fas fa-check"></i> Bayar & Cetak Struk
            </button>
        </div>
    </aside>
</div>

<section class="kasir-card" style="margin-top:40px;">
    <header style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;">
        <div>
            <h2><i class="fas fa-chart-bar"></i> Ringkasan Shift</h2>
            <p style="margin:0;color:#94a3b8;">Statistik dummy untuk preview tampilan.</p>
        </div>
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
            <span style="padding:10px 16px;border-radius:12px;background:#ecfccb;color:#3f6212;font-weight:600;">
                <i class="fas fa-receipt"></i> 12 Transaksi
            </span>
            <span style="padding:10px 16px;border-radius:12px;background:#e0f2fe;color:#075985;font-weight:600;">
                <i class="fas fa-money-bill-wave"></i> Rp1.280.000
            </span>
            <span style="padding:10px 16px;border-radius:12px;background:#fee2e2;color:#b91c1c;font-weight:600;">
                <i class="fas fa-undo"></i> 2 Refund
            </span>
        </div>
    </header>
    <div style="margin-top:24px;display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:20px;">
        <div style="background:#f8fafc;border-radius:18px;padding:16px;">
            <small style="color:#94a3b8;font-weight:600;">Rata-rata Struk</small>
            <strong style="display:block;margin-top:8px;font-size:1.4rem;">Rp106.000</strong>
            <span style="color:#22c55e;font-weight:600;font-size:0.9rem;">+8% dari kemarin</span>
        </div>
        <div style="background:#fdf2f8;border-radius:18px;padding:16px;">
            <small style="color:#db2777;font-weight:600;">Metode Favorit</small>
            <strong style="display:block;margin-top:8px;font-size:1.4rem;">QRIS Static</strong>
            <span style="color:#db2777;font-weight:600;font-size:0.9rem;">62% transaksi</span>
        </div>
        <div style="background:#eff6ff;border-radius:18px;padding:16px;">
            <small style="color:#2563eb;font-weight:600;">Waktu Terpadat</small>
            <strong style="display:block;margin-top:8px;font-size:1.4rem;">14.00 - 16.00</strong>
            <span style="color:#1d4ed8;font-weight:600;font-size:0.9rem;">5 transaksi</span>
        </div>
    </div>
</section>
</div>

<?php
$additional_js = ['https://cdn.jsdelivr.net/npm/sweetalert2@11'];
$inline_script = <<<'JS'
let cart = [];
let selectedCategory = 'Semua Produk';
let selectedPayment = 'QRIS Static';
let memberDiscount = 0;

const products = <?php echo json_encode($products); ?>;

function formatCurrency(amount) {
    return 'Rp' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function calculateTotals() {
    const subtotal = cart.reduce((sum, item) => sum + (item.qty * item.price), 0);
    const discount = memberDiscount;
    const grandTotal = subtotal - discount;
    
    document.getElementById('subtotal').textContent = formatCurrency(subtotal);
    document.getElementById('discount').textContent = '-' + formatCurrency(discount);
    document.getElementById('grandTotal').textContent = formatCurrency(grandTotal);
}

function updateCartDisplay() {
    const cartBody = document.getElementById('cartBody');
    const emptyCart = document.getElementById('emptyCart');
    const cartTable = document.getElementById('cartTable');
    const totalsSection = document.getElementById('totalsSection');
    const paymentSection = document.getElementById('paymentSection');
    const actionButtons = document.getElementById('actionButtons');
    
    if (cart.length === 0) {
        emptyCart.style.display = 'block';
        cartTable.style.display = 'none';
        totalsSection.style.display = 'none';
        paymentSection.style.display = 'none';
        actionButtons.style.display = 'none';
        return;
    }
    
    emptyCart.style.display = 'none';
    cartTable.style.display = 'table';
    totalsSection.style.display = 'block';
    paymentSection.style.display = 'block';
    actionButtons.style.display = 'grid';
    
    cartBody.innerHTML = cart.map((item, index) => `
        <tr>
            <td>
                <strong>${item.name}</strong><br>
                <small style="color:#94a3b8;">${item.note || 'Tidak ada catatan'}</small>
            </td>
            <td style="text-align:center;">
                <div style="display:flex;align-items:center;justify-content:center;gap:8px;">
                    <button type="button" class="btn-qty" data-action="decrease" data-index="${index}" style="width:28px;height:28px;border:none;border-radius:6px;background:#f1f5f9;cursor:pointer;font-weight:600;">-</button>
                    <span class="qty-pill">${item.qty}</span>
                    <button type="button" class="btn-qty" data-action="increase" data-index="${index}" style="width:28px;height:28px;border:none;border-radius:6px;background:#dbeafe;cursor:pointer;font-weight:600;color:#2563eb;">+</button>
                </div>
            </td>
            <td style="text-align:right;font-weight:600;">${formatCurrency(item.qty * item.price)}</td>
            <td>
                <button type="button" class="btn-remove-item" data-index="${index}" style="border:none;background:transparent;color:#f43f5e;cursor:pointer;font-size:1.1rem;" title="Hapus">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    `).join('');
    
    calculateTotals();
}

function filterProducts() {
    const searchTerm = document.getElementById('searchProduct').value.toLowerCase();
    const productCards = document.querySelectorAll('.kasir-product');
    
    productCards.forEach(card => {
        const name = card.dataset.name.toLowerCase();
        const category = card.dataset.category;
        const matchesSearch = name.includes(searchTerm);
        const matchesCategory = selectedCategory === 'Semua Produk' || category === selectedCategory;
        
        if (matchesSearch && matchesCategory) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

document.querySelectorAll('.btn-category').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.btn-category').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        selectedCategory = this.dataset.category;
        filterProducts();
    });
});

document.getElementById('searchProduct').addEventListener('input', filterProducts);

document.querySelectorAll('.btn-add-product').forEach(btn => {
    btn.addEventListener('click', function() {
        const productId = parseInt(this.dataset.id);
        const product = products.find(p => p.id === productId);
        
        if (!product) return;
        
        const existingItem = cart.find(item => item.id === productId);
        
        if (existingItem) {
            existingItem.qty++;
        } else {
            cart.push({
                id: product.id,
                name: product.name,
                price: product.price,
                qty: 1,
                note: ''
            });
        }
        
        updateCartDisplay();
        
        Swal.fire({
            icon: 'success',
            title: 'Ditambahkan!',
            text: `${product.name} ditambahkan ke keranjang`,
            timer: 1500,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    });
});

document.addEventListener('click', function(e) {
    if (e.target.closest('.btn-qty')) {
        const btn = e.target.closest('.btn-qty');
        const index = parseInt(btn.dataset.index);
        const action = btn.dataset.action;
        
        if (action === 'increase') {
            cart[index].qty++;
        } else if (action === 'decrease' && cart[index].qty > 1) {
            cart[index].qty--;
        }
        
        updateCartDisplay();
    }
    
    if (e.target.closest('.btn-remove-item')) {
        const btn = e.target.closest('.btn-remove-item');
        const index = parseInt(btn.dataset.index);
        const itemName = cart[index].name;
        
        Swal.fire({
            title: 'Hapus item?',
            text: `Hapus ${itemName} dari keranjang?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f43f5e',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                cart.splice(index, 1);
                updateCartDisplay();
                Swal.fire({
                    icon: 'success',
                    title: 'Dihapus!',
                    text: `${itemName} dihapus dari keranjang`,
                    timer: 1500,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            }
        });
    }
});

document.querySelectorAll('.btn-payment-method').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.btn-payment-method').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        selectedPayment = this.dataset.method;
    });
});

document.getElementById('btnCancel').addEventListener('click', function() {
    if (cart.length === 0) return;
    
    Swal.fire({
        title: 'Batalkan transaksi?',
        text: 'Semua item di keranjang akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f43f5e',
        cancelButtonColor: '#94a3b8',
        confirmButtonText: 'Ya, batalkan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            cart = [];
            updateCartDisplay();
            Swal.fire({
                icon: 'success',
                title: 'Dibatalkan!',
                text: 'Transaksi dibatalkan',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });
});

document.getElementById('btnHold').addEventListener('click', function() {
    if (cart.length === 0) return;
    
    Swal.fire({
        title: 'Hold pesanan?',
        text: 'Pesanan akan disimpan untuk dilanjutkan nanti',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#fbbf24',
        cancelButtonColor: '#94a3b8',
        confirmButtonText: 'Ya, hold',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Pesanan di-hold!',
                text: 'Pesanan berhasil disimpan',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });
});

document.getElementById('btnPay').addEventListener('click', function() {
    if (cart.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Keranjang kosong!',
            text: 'Tambahkan produk terlebih dahulu'
        });
        return;
    }
    
    const subtotal = cart.reduce((sum, item) => sum + (item.qty * item.price), 0);
    const grandTotal = subtotal - memberDiscount;
    
    Swal.fire({
        title: 'Konfirmasi Pembayaran',
        html: `
            <div style="text-align:left;">
                <p><strong>Metode:</strong> ${selectedPayment}</p>
                <p><strong>Total:</strong> ${formatCurrency(grandTotal)}</p>
                <p style="color:#94a3b8;font-size:0.9rem;">${cart.length} item dalam keranjang</p>
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#2563eb',
        cancelButtonColor: '#94a3b8',
        confirmButtonText: 'Ya, bayar',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Transaksi berhasil!',
                html: `
                    <p>Struk akan dicetak otomatis</p>
                    <p style="color:#94a3b8;font-size:0.9rem;">Total: ${formatCurrency(grandTotal)}</p>
                `,
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                cart = [];
                updateCartDisplay();
            });
        }
    });
});

document.getElementById('btnLogout').addEventListener('click', function() {
    Swal.fire({
        title: 'Logout?',
        text: 'Anda akan keluar dari sistem kasir',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#f43f5e',
        cancelButtonColor: '#94a3b8',
        confirmButtonText: 'Ya, logout',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Logout berhasil!',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });
});

updateCartDisplay();
JS;

$this->load->view('inc/kasir/footer', compact('additional_js', 'inline_script'));
?>

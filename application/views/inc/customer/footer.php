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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php if (isset($additional_js)): ?>
        <?php foreach ($additional_js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($page_script)): ?>
        <script>
            <?php echo $page_script; ?>
        </script>
    <?php endif; ?>
</body>
</html>


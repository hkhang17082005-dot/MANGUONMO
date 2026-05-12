<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm | HUTECH Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .product-card { 
            border: none; 
            border-radius: 15px; 
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
            overflow: hidden;
        }
        .product-card:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; 
        }
        .price-tag { color: #0d6efd; font-weight: 700; font-size: 1.25rem; }
        .btn-action { border-radius: 8px; padding: 8px 16px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo BASE_URL; ?>">
                <i class="fas fa-shopping-cart me-2"></i>HUTECH STORE
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold text-dark">Danh mục sản phẩm</h2>
            <a href="<?php echo BASE_URL; ?>Product/add" class="btn btn-success btn-action shadow-sm">
                <i class="fas fa-plus me-2"></i>Thêm sản phẩm mới
            </a>
        </div>

        <?php if (empty($products)): ?>
            <div class="text-center py-5">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="Empty" style="width: 150px; opacity: 0.5;">
                <p class="text-muted mt-3">Chưa có sản phẩm nào được đăng bán.</p>
            </div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 product-card shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-light text-primary mb-3">ID: #<?php echo $product->getID(); ?></span>
                                </div>
                                <h5 class="card-title fw-bold mb-2"><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h5>
                                <p class="card-text text-secondary small mb-4">
                                    <?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="price-tag"><?php echo number_format($product->getPrice(), 0, ',', '.'); ?> <small>VNĐ</small></span>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0 p-4 pt-0 d-flex gap-2">
                                <a href="<?php echo BASE_URL; ?>Product/edit/<?php echo $product->getID(); ?>" class="btn btn-outline-warning btn-sm flex-grow-1 btn-action">
                                    <i class="fas fa-edit me-1"></i>Sửa
                                </a>
                                <a href="<?php echo BASE_URL; ?>Product/delete/<?php echo $product->getID(); ?>" 
                                   class="btn btn-outline-danger btn-sm flex-grow-1 btn-action"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                    <i class="fas fa-trash me-1"></i>Xóa
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
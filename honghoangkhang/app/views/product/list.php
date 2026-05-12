<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Cửa hàng HUTECH</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Danh sách sản phẩm</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="<?php echo BASE_URL; ?>Product/add" class="btn btn-success">+ Thêm sản phẩm mới</a>
            </div>
        </div>

        <?php if (empty($products)): ?>
            <div class="alert alert-info">
                Chưa có sản phẩm nào. <a href="<?php echo BASE_URL; ?>Product/add">Thêm sản phẩm mới</a>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h5>
                                <p class="card-text text-muted"><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
                                <p class="card-text">
                                    <strong>Giá: <?php echo number_format($product->getPrice(), 2, ',', '.'); ?> đ</strong>
                                </p>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo BASE_URL; ?>Product/edit/<?php echo $product->getID(); ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="<?php echo BASE_URL; ?>Product/delete/<?php echo $product->getID(); ?>" class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
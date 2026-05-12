<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm | HUTECH Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fff8f0; }
        .form-container { max-width: 600px; margin: 50px auto; }
        .card { border: none; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); }
        .btn-warning { color: #fff; background-color: #f39c12; border: none; }
        .btn-warning:hover { background-color: #e67e22; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="icon-box bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-edit fa-lg"></i>
                    </div>
                    <h2 class="fw-bold">Chỉnh sửa</h2>
                    <p class="text-muted small">Đang cập nhật: <strong><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></strong></p>
                </div>

                <form method="POST" action="<?php echo BASE_URL; ?>Product/edit/<?php echo $product->getID(); ?>">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Giá niêm yết</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="price" name="price" step="0.01"
                                   value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required>
                            <span class="input-group-text">VNĐ</span>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-5">
                        <button type="submit" class="btn btn-warning btn-lg rounded-pill fw-bold">Lưu thay đổi</button>
                        <a href="<?php echo BASE_URL; ?>Product/list" class="btn btn-link text-decoration-none text-muted">Quay lại danh sách</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
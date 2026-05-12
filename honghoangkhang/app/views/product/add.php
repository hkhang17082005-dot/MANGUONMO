<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm | HUTECH Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f0f2f5; }
        .form-container { max-width: 600px; margin: 50px auto; }
        .card { border: none; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); }
        .form-control:focus { box-shadow: none; border-color: #0d6efd; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="icon-box bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-plus fa-lg"></i>
                    </div>
                    <h2 class="fw-bold">Thêm sản phẩm</h2>
                    <p class="text-muted">Điền đầy đủ thông tin bên dưới</p>
                </div>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger border-0 shadow-sm rounded-3">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo BASE_URL; ?>Product/add" onsubmit="return validateForm();">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tên sản phẩm</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-tag text-muted"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ví dụ: Laptop Dell XPS 13" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập chi tiết về sản phẩm..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Giá bán (VNĐ)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-dollar-sign text-muted"></i></span>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-5">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold">Xác nhận thêm</button>
                        <a href="<?php echo BASE_URL; ?>Product/list" class="btn btn-link text-decoration-none text-muted mt-2">Hủy bỏ và quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            if (name.length < 10 || name.length > 100) { alert('Tên phải từ 10-100 ký tự'); return false; }
            if (price <= 0) { alert('Giá phải lớn hơn 0'); return false; }
            return true;
        }
    </script>
</body>
</html>
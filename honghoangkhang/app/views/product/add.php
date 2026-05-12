<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Cửa hàng HUTECH</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Thêm sản phẩm mới</h1>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <h5>Vui lòng kiểm tra:</h5>
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo BASE_URL; ?>Product/add" onsubmit="return validateForm();">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               placeholder="Nhập tên sản phẩm (10-100 ký tự)" required>
                        <small class="form-text text-muted">Tối thiểu 10 ký tự, tối đa 100 ký tự</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea class="form-control" id="description" name="description" 
                                  rows="4" placeholder="Nhập mô tả sản phẩm" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Giá:</label>
                        <input type="number" class="form-control" id="price" name="price" 
                               placeholder="Nhập giá (> 0)" step="0.01" min="0.01" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>

                    <div class="mt-3 text-center">
                        <a href="<?php echo BASE_URL; ?>Product/list" class="btn btn-secondary">Quay lại danh sách</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            let errors = [];

            if (name.length < 10 || name.length > 100) {
                errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
            }

            if (price <= 0 || isNaN(price)) {
                errors.push('Giá phải là một số dương lớn hơn 0.');
            }

            if (errors.length > 0) {
                alert(errors.join('\n'));
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
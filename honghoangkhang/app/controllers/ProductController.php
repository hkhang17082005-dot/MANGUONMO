<?php
class ProductController
{
    private $products = [];
    
    public function __construct()
    {
        if (isset($_SESSION['products'])) {
            $this->products = $_SESSION['products'];
        }
    }
    
    public function index()
    {
        $this->list();
    }
    
    public function list()
    {
        $products = $this->products;
        include 'app/views/product/list.php';
    }
    
    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            
            if (empty($name)) {
                $errors[] = 'Tên sản phẩm là bắt buộc.';
            } elseif (strlen($name) < 10 || strlen($name) > 100) {
                $errors[] = 'Tên sản phẩm phải có từ 10 đến 100 ký tự.';
            }
            
            if (!is_numeric($price) || $price <= 0) {
                $errors[] = 'Giá phải là một số dương lớn hơn 0.';
            }
            
            if (empty($errors)) {
                $id = count($this->products) + 1;
                $product = new ProductModel($id, $name, $description, $price);
                $this->products[] = $product;
                $_SESSION['products'] = $this->products;
                // Sử dụng BASE_URL thay vì /project1/
                header('Location: ' . BASE_URL . 'Product/list');
                exit();
            }
        }
        include 'app/views/product/add.php';
    }
    
    public function edit($id)
    {
        $errors = []; // Thêm biến lưu lỗi
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            // Bổ sung Validation cho chức năng Sửa giống như Thêm mới
            if (empty($name)) {
                $errors[] = 'Tên sản phẩm là bắt buộc.';
            } elseif (strlen($name) < 10 || strlen($name) > 100) {
                $errors[] = 'Tên sản phẩm phải có từ 10 đến 100 ký tự.';
            }
            
            if (!is_numeric($price) || $price <= 0) {
                $errors[] = 'Giá phải là một số dương lớn hơn 0.';
            }

            if (empty($errors)) {
                foreach ($this->products as $key => $product) {
                    if ($product->getID() == $id) {
                        $this->products[$key]->setName($name);
                        $this->products[$key]->setDescription($description);
                        $this->products[$key]->setPrice($price);
                        break;
                    }
                }
                $_SESSION['products'] = $this->products;
                header('Location: ' . BASE_URL . 'Product/list');
                exit();
            }
        }
        
        foreach ($this->products as $product) {
            if ($product->getID() == $id) {
                include 'app/views/product/edit.php';
                return;
            }
        }
        die('Product not found');
    }
    
    public function delete($id)
    {
        foreach ($this->products as $key => $product) {
            if ($product->getID() == $id) {
                unset($this->products[$key]);
                break;
            }
        }
        $this->products = array_values($this->products);
        $_SESSION['products'] = $this->products;
        header('Location: ' . BASE_URL . 'Product/list');
        exit();
    }
}
?>
<?php
require_once('baseController.php');
require_once('models/ProductModel.php');
require_once('models/Database.php');

class ProductController extends BaseController
{
    private $product; // Thêm thuộc tính này để lưu trữ đối tượng ProductModel

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->product = new ProductModel($db);
        $this->folder = 'product';
    }

    public function index()
    {
        $data['products'] = $this->product->getAllProducts();
        $data['categories'] = $this->product->getAllCategories();
        $data['uploadDir'] = $this->uploadDir;
        $this->render('index', $data);
    }

    public function create()
    {
        $categories = $this->product->getAllCategories();
        $data['uploadDir'] = $this->uploadDir;
        $data['categories'] = $categories;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý tạo mới sản phẩm từ dữ liệu form POST
            $productName = $_POST['productName'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
            $image1 = $_FILES['image_1']['name'];
            $image2 = $_FILES['image_2']['name'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $categoryID = $_POST['categoryID'];

            // Gọi phương thức tạo mới sản phẩm từ model
            $productId = $this->product->createProduct($productName, $price, $image, $image1, $image2, $description, $quantity, $categoryID);

            // Chuyển hướng đến trang danh sách sản phẩm sau khi đã tạo mới thành công
            header('Location: index.php?controller=product&action=index');
            exit();
        }

        // Nếu không phải là phương thức POST, hiển thị form tạo mới sản phẩm
        $this->render('create', $data);
    }

    public function update($productId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form POST
            $productName = $_POST['productName'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
            $image1 = $_FILES['image_1']['name'];
            $image2 = $_FILES['image_2']['name'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $categoryID = $_POST['categoryID'];

            // Gọi phương thức cập nhật thông tin sản phẩm từ model
            $this->product->updateProduct($productId, $productName, $price, $image, $image1, $image2, $description, $quantity, $categoryID);

            // Chuyển hướng đến trang danh sách sản phẩm sau khi đã cập nhật thành công
            header('Location: index.php?controller=product&action=index');
            exit();
        }

        // Nếu không phải là phương thức POST, hiển thị form cập nhật thông tin sản phẩm
        $product = $this->product->getProductById($productId);
        $data['products'] = $product;
        $data['categories'] = $this->product->getAllCategories();
        $this->render('update', $data);
    }

    public function delete($productId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $result = $this->product->deleteProduct($productId);
            if ($result) {
                header('Location: index.php?controller=product&action=index&success=1');
                exit();
            } else {
                header('Location: index.php?controller=product&action=index&error=1');
                exit();
            }
        } else {
            echo "Phương thức không hợp lệ!";
        }
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}

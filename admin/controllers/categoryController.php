<?php
require_once('baseController.php');
require_once('models/CategoryModel.php');
require_once('models/Database.php');

class CategoryController extends BaseController
{
    private $category; // Thêm thuộc tính này để lưu trữ đối tượng CategoryModel

    public function __construct()
    {
        $db = new Database();
        $this->category = new CategoryModel($db);
        $this->folder = 'category';
    }

    public function index()
    {
        $data['categories'] = $this->category->getAllCategories();
        $this->render('index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý tạo mới danh mục từ dữ liệu form POST
            $categoryName = $_POST['CategoryName'];

            // Gọi phương thức tạo mới danh mục từ model
            $categoryId = $this->category->createCategory($categoryName);

            // Chuyển hướng đến trang danh sách danh mục sau khi đã tạo mới thành công
            header('Location: index.php?controller=category&action=index');
            exit();
        }

        // Nếu không phải là phương thức POST, hiển thị form tạo mới danh mục
        $this->render('create');
    }

    public function update($categoryId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý cập nhật thông tin danh mục từ dữ liệu form POST
            $newData = [
                'CategoryName' => $_POST['CategoryName']
            ];

            // Gọi phương thức cập nhật thông tin danh mục từ model
            $this->category->updateCategory($categoryId, $newData);

            // Chuyển hướng đến trang danh sách danh mục sau khi đã cập nhật thành công
            header('Location: index.php?controller=category&action=index');
            exit();
        }

        // Nếu không phải là phương thức POST, hiển thị form cập nhật thông tin danh mục
        $category = $this->category->getCategoryById($categoryId);
        $data['category'] = $category; // Chắc chắn đã truyền biến $category vào view
        $this->render('update', $data);
    }


    public function delete($categoryId)
    {
        $this->category->deleteCategory($categoryId);

        header('Location: index.php?controller=category&action=index');
        exit();
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}

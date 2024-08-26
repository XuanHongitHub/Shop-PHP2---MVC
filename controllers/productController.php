<?php
require_once('baseController.php');
require_once('models/Database.php');
require_once('models/productModel.php');
require_once('models/cartModel.php');



class ProductController extends BaseController
{
    private $product;
    private $cartModel;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->product = new ProductModel($db);
        $this->cartModel = new CartModel($db);
        $this->folder = 'product';
    }
    public function index()
    {
        $customerId = isset($_SESSION['CustomerID']) ? $_SESSION['CustomerID'] : null;
        $data['cartItems'] = $this->cartModel->getCartItems($customerId);
        $data['products'] = $this->product->getAllProducts();
        $data['categories'] = $this->product->getAllCategories();
        $data['uploadDir'] = $this->uploadDir;
        $this->render('index', $data);
    }
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $productId = isset($_GET['productId']) ? $_GET['productId'] : null;
            $customerId = isset($_GET['customerId']) ? $_GET['customerId'] : null;

            if ($productId && $customerId) {
                $this->cartModel->deleteCart($productId, $customerId);

                header("Location: index.php?controller=product&action=index");
                exit();
            }
        }
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}

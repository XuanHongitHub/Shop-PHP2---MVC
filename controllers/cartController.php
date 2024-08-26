<?php
require_once('BaseController.php');
require_once('models/cartModel.php');
require_once('models/productModel.php');

class CartController extends BaseController
{
    private $cartModel;
    private $product;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->cartModel = new CartModel($db);
        $this->product = new ProductModel($db);

        $this->folder = 'cart';
    }
    public function index()
    {
        $customerId = isset($_SESSION['CustomerID']) ? $_SESSION['CustomerID'] : null;
        if ($customerId) {
            $cartItems = $this->cartModel->getCartItems($customerId);
        } else {
            header('Location: index.php?controller=auth&action=login');
            exit();
        }

        $data = [
            'cartItems' => $cartItems,
            'uploadDir' => $this->uploadDir
        ];
        $this->render('index', $data);
    }
    public function add()
    {
        if (isset($_GET['customerId']) && isset($_GET['id']) && isset($_GET['quantity'])) {
            $customerId = $_GET['customerId'];
            $productId = $_GET['id'];
            $quantity = $_GET['quantity'];

            $this->cartModel->addToCart($customerId, $productId, $quantity);
        } else {
            echo "Missing CustomerID, ProductID, or Quantity.";
        }
    }
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cartData = $_POST['cart'];

            $this->cartModel->updateCart($cartData);

            header("Location: index.php?controller=cart&action=index");
            exit();
        }
    }
    public function checkout()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cartData = $_POST['cart'];

            $this->cartModel->updateCart($cartData);

            header("Location: index.php?controller=checkout&action=index");
            exit();
        }
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $productId = isset($_GET['productId']) ? $_GET['productId'] : null;
            $customerId = isset($_GET['customerId']) ? $_GET['customerId'] : null;

            if ($productId && $customerId) {
                $this->cartModel->deleteCart($productId, $customerId);

                header("Location: index.php?controller=cart&action=index");
                exit();
            }
        }
    }


}
?>
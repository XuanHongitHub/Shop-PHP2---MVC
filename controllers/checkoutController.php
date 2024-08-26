<?php
require_once('BaseController.php');
require_once('models/checkoutModel.php');
require_once('models/cartModel.php');
class CheckoutController extends BaseController
{
    private $cartModel;
    private $product;
    private $checkoutModel;
    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->cartModel = new CartModel($db);
        $this->checkoutModel = new CheckoutModel($db);
        $this->folder = 'checkout';
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
    public function placeOrder()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $orderData = [
                'customer_id' => $_POST['customer_id'],
                'customer_name' => $_POST['customer_name'],
                'customer_phone' => $_POST['customer_phone'],
                'customer_email' => $_POST['customer_email'],
                'shipping_address' => $_POST['shipping_address'],
                'order_note' => $_POST['order_note']
            ];

            $orderId = $this->checkoutModel->addOrder($orderData);

            if ($orderId) {
                $customerId = $orderData['customer_id'];

                $cartItems = $this->cartModel->getCartItems($customerId);
                foreach ($cartItems as $item) {
                    $productId = $item['ProductID'];
                    $quantity = $item['Quantity'];
                    $unitPrice = $item['Price'];
                    $this->checkoutModel->addOrderDetail($orderId, $productId, $quantity, $unitPrice);
                }

                header("Location: index.php?controller=checkout&action=confirmation&orderId=$orderId");
                exit();
            } else {
                echo "Failed to place order.";
            }
        }
    }
    public function confirmation()
    {
        $orderId = isset($_GET['orderId']) ? $_GET['orderId'] : null;

        if ($orderId) {
            $order = $this->checkoutModel->getOrderDetails($orderId);

            if ($order) {
                $this->cartModel->clearCart();

                header('Location: index.php?controller=checkout&action=index&success=1');
                exit();
            } else {
                header('Location: index.php?controller=checkout&action=index&error=1');
                exit();
            }
        } else {
            echo "Order ID is missing.";
        }
    }

}
?>
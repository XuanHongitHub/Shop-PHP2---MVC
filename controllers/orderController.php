<?php
require_once('baseController.php');
require_once('models/orderModel.php');
require_once('models/Database.php');
require_once('models/checkoutModel.php');
require_once('models/cartModel.php');
require_once('models/accountModel.php');


class OrderController extends BaseController
{
    private $orderModel;
    private $cartModel;
    private $product;
    private $checkoutModel;
    private $account;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->orderModel = new OrderModel($db);
        $this->cartModel = new CartModel($db);
        $this->checkoutModel = new CheckoutModel($db);
        $this->account = new AccountModel($db);
        $this->checkoutModel = new CheckoutModel($db);
        $this->folder = 'order';
    }

    public function index()
    {
        $customerId = isset($_SESSION['CustomerID']) ? $_SESSION['CustomerID'] : null;

        if ($customerId) {
            $userData = $this->account->getUserById($customerId);

            if ($userData) {
                $orders = $this->checkoutModel->getOrdersByCustomerId($customerId); // Sửa đúng tên biến $checkoutModel thành $this->checkoutModel

                $data = [
                    'userData' => $userData,
                    'orders' => $orders
                ];

                $this->render('index', $data);
            } else {
                header('Location: index.php?controller=account&action=error');
                exit();
            }
        } else {
            header('Location: index.php?controller=auth&action=login');
            exit();
        }
    }

    public function error()
    {
        require "./views/layouts/error.php";
    }
}

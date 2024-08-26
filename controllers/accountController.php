<?php
require_once('baseController.php');
require_once('models/accountModel.php');
require_once('models/checkoutModel.php');
require_once('models/Database.php');
class AccountController extends BaseController
{
    private $account;
    private $checkoutModel;
    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->account = new AccountModel($db);
        $this->checkoutModel = new CheckoutModel($db);
        $this->folder = 'account';
    }
    public function index()
    {
        $customerId = isset($_SESSION['CustomerID']) ? $_SESSION['CustomerID'] : null;

        if ($customerId) {
            $userData = $this->account->getUserById($customerId);

            if ($userData) {
                $orders = $this->checkoutModel->getOrdersByCustomerId($customerId);

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
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customername = $_POST['customername'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            $updated = $this->account->updateUserData($customername, $email, $address, $phone);

            if ($updated) {
                header('Location: index.php?controller=account&action=index&success=1');
                exit();
            } else {
                header('Location: index.php?controller=account&action=index&error=1');
                exit();
            }
        } else {
            header('Location: index.php?controller=account&action=error');
            exit();
        }
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}
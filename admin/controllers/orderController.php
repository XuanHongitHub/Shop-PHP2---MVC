<?php
require_once('BaseController.php');
require_once('models/orderModel.php');

class OrderController extends BaseController
{
    private $orderModel;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->orderModel = new OrderModel($db);
        $this->folder = 'order';
    }

    public function index()
    {
        $orders = $this->orderModel->getAllOrders();
        $this->render('index', ['orders' => $orders]);
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}
?>
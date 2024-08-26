<?php

require_once('BaseController.php');
require_once('models/OrderDetailsModel.php');

class OrderDetailsController extends BaseController
{
    private $orderDetailsModel;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->orderDetailsModel = new OrderDetailsModel($db);
        $this->folder = 'orderdetails';
    }

    public function index()
    {
        $orderDetails = $this->orderDetailsModel->getAllOrderDetails();
        $this->render('index', ['orderDetails' => $orderDetails]);
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}

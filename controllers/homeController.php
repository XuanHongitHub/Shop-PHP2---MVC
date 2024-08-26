<?php
require_once('baseController.php');
require_once('models/productModel.php');
require_once('models/Database.php');


class HomeController extends BaseController
{
  private $product;

  public function __construct()
  {
    parent::__construct();
    $db = new Database();
    $this->product = new ProductModel($db);
    $this->folder = 'layouts';
  }

  public function index()
  {
    $data['products'] = $this->product->getAllProducts();
    $data['categories'] = $this->product->getAllCategories();
    $data['uploadDir'] = $this->uploadDir;
    $this->render('home', $data);

  }

  public function error()
  {
    require "./views/layouts/error.php";
  }
}

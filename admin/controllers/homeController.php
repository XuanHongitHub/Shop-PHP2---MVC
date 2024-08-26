<?php
require_once('baseController.php');
include __DIR__ . '/../models/productModel.php';
class homeController extends BaseController
{
  protected $db;

  public function __construct()
  {

    $this->folder = 'layouts';
  }
  public function index()
  {

    $this->render('home');

  }

  public function error()
  {
    require "./views/layouts/error.php";
  }
}
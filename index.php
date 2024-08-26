<?php
session_start();

if (isset($_SESSION['CustomerID'])) {
  $customerId = $_SESSION['CustomerID'];
} else {
  $_SESSION['message'] = "Bạn cần phải đăng nhập hoặc đăng ký để mua hàng.";
}

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'home';
  $action = 'index';
}

require_once('routes.php');
$route = new routes();

if ($controller === 'auth' && $action === 'login') {
  require_once('controllers/authController.php');
  $authController = new AuthController();
  $authController->login();
} else {
  $route->checkRoute($controller, $action);
}

?>
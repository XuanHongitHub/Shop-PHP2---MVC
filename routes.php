<?php
class routes
{
  private $controllers = [
    'home' => ['home', 'index'],
    'product' => ['product', 'index', 'delete'],
    'detail' => ['detail', 'index', 'comment'],
    'about' => ['about', 'index'],
    'cart' => ['cart', 'index', 'add', 'update', 'delete', 'checkout'],
    'checkout' => ['checkout', 'index', 'add', 'update', 'delete', 'placeOrder', 'confirmation'],
    'contact' => ['contact', 'index', 'sendMessage'],
    'auth' => ['auth', 'login', 'register', 'forgot', 'enterToken', 'create', 'logout'],
    'account' => ['account', 'index', 'update', ''],
    'order' => ['order', 'index']
  ];
  public function checkRoute($controller, $action)
  {
    if (
      !array_key_exists($controller, $this->controllers) ||
      !in_array($action, $this->controllers[$controller])
    ) {
      $this->processRoute('home', 'error');
    } else {
      $this->processRoute($controller, $action);
    }
  }

  public function getIdFromUrl()
  {
    return isset($_GET['id']) ? $_GET['id'] : (isset($_GET['productId']) ? $_GET['productId'] : (isset($_GET['categoryId']) ? $_GET['categoryId'] : null));
  }

  public function processRoute($controller, $action)
  {
    include_once('controllers/' . $controller . 'Controller.php');
    $class = $controller . 'Controller';
    $controllerInstance = new $class;

    // Gọi phương thức với $productId
    if (method_exists($controllerInstance, $action)) {
      $productId = $this->getIdFromUrl();
      $controllerInstance->$action($productId);
    } else {
      // Gọi phương thức không có $productId
      $controllerInstance->$action();
    }
  }
}

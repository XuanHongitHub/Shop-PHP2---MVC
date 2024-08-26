<?php
class routes
{
    private $controllers = [
        'home' => ['home', 'index'],
        'product' => ['product', 'index', 'create', 'update', 'delete'],
        'category' => ['category', 'index', 'create', 'update', 'delete'],
        'user' => ['user', 'index', 'create', 'update', 'delete'],
        'comment' => ['comment', 'index', 'create', 'update', 'delete'],
        'order' => ['order', 'index', 'create', 'update', 'delete'],
        'orderdetails' => ['orderdetails', 'index', 'create', 'update', 'delete']
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
        return isset($_GET['commentId']) ? $_GET['commentId'] : (isset($_GET['id']) ? $_GET['id'] : (isset($_GET['productId']) ? $_GET['productId'] : (isset($_GET['categoryId']) ? $_GET['categoryId'] : null)));
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

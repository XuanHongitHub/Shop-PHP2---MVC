<?php
require_once('Database.php');

class CheckoutModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }
    public function getCartItems($customerId)
    {
        $query = "SELECT cart.*, product.Image, product.ProductName, product.Price FROM cart JOIN product ON cart.ProductID = product.ProductID WHERE CustomerID = :customerId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':customerId' => $customerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOrdersByCustomerId($customerId)
    {
        $query = "SELECT o.*, SUM(`orderdetails`.UnitPrice * `orderdetails`.Quantity) AS Total 
                  FROM `order` o 
                  JOIN `orderdetails` ON o.OrderID = `orderdetails`.OrderID 
                  WHERE o.CustomerID = :customerId 
                  GROUP BY o.OrderID";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':customerId', $customerId);
        $stmt->execute();

        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }
    public function addOrder($orderData)
    {
        $customerId = $orderData['customer_id'];
        $customerName = $orderData['customer_name'];
        $customerPhone = $orderData['customer_phone'];
        $orderDate = date('Y-m-d');
        $shippingAddress = $orderData['shipping_address'];
        $paymentStatus = 'Pending';
        $orderNote = $orderData['order_note'];

        $query = "INSERT INTO `order` (CustomerID, CustomerName, CustomerPhone, OrderDate, ShippingAddress, PaymentStatus, OrderNote)
          VALUES (:customerId, :customerName, :customerPhone, :orderDate, :shippingAddress, :paymentStatus, :orderNote)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':customerId', $customerId, PDO::PARAM_INT);
        $stmt->bindValue(':customerName', $customerName, PDO::PARAM_STR);
        $stmt->bindValue(':customerPhone', $customerPhone, PDO::PARAM_STR);
        $stmt->bindValue(':orderDate', $orderDate, PDO::PARAM_STR);
        $stmt->bindValue(':shippingAddress', $shippingAddress, PDO::PARAM_STR);
        $stmt->bindValue(':paymentStatus', $paymentStatus, PDO::PARAM_STR);
        $stmt->bindValue(':orderNote', $orderNote, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function addOrderDetail($orderId, $productId, $quantity, $unitPrice)
    {
        $query = "INSERT INTO `orderdetails` (OrderID, ProductID, Quantity, UnitPrice)
                  VALUES (:orderId, :productId, :quantity, :unitPrice)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':orderId', $orderId, PDO::PARAM_INT);
        $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindValue(':unitPrice', $unitPrice, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getOrderDetails($orderId)
    {
        $query = "SELECT * FROM `order` WHERE OrderID = :orderId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':orderId' => $orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>
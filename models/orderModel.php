<?php
require_once('Database.php');

class OrderModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
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

}
?>
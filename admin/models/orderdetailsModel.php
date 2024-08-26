<?php
require_once('Database.php');

class OrderDetailsModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    // Hàm lấy tất cả chi tiết đơn hàng
    public function getAllOrderDetails()
    {
        $query = "SELECT od.*, (od.UnitPrice * od.Quantity) AS Total 
                  FROM `orderdetails` od";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

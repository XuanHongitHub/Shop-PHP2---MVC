<?php
require_once('Database.php');

class OrderModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }
    public function getAllOrders()
    {
        // Truy vấn SQL để lấy thông tin đơn hàng và tính tổng cộng
        $query = "SELECT o.*, SUM(`orderdetails`.UnitPrice * `orderdetails`.Quantity) AS Total 
                  FROM `order` o 
                  JOIN `orderdetails` ON o.OrderID = `orderdetails`.OrderID 
                  GROUP BY o.OrderID";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        // Lấy dữ liệu đơn hàng từ kết quả truy vấn
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Trả về dữ liệu đơn hàng
        return $orders;
    }
}
?>
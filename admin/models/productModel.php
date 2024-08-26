<?php

class ProductModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM product');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getProductById($productId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM product WHERE ProductID = ?");
            $stmt->execute([$productId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            return null;
        }
    }
    public function getAllCategories()
    {
        $stmt = $this->pdo->prepare('SELECT CategoryID, CategoryName FROM category');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Thêm sản phẩm mới
    public function createProduct($productName, $price, $image, $image1, $image2, $description, $quantity, $categoryID)
    {
        $uploadDir = '../assets/upload/';
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $image);
        move_uploaded_file($_FILES['image1']['tmp_name'], $uploadDir . $image1);
        move_uploaded_file($_FILES['image2']['tmp_name'], $uploadDir . $image2);
        $stmt = $this->pdo->prepare('INSERT INTO product (productName, price, Image, Image_1, Image_2, description, quantity, CategoryID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$productName, $price, $image, $image1, $image2, $description, $quantity, $categoryID]);
        return $this->pdo->lastInsertId();
    }
    public function updateProduct($productId, $productName, $price, $image, $image1, $image2, $description, $quantity, $categoryID)
    {
        $uploadDir = '../assets/upload/';
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $image);
        move_uploaded_file($_FILES['image_1']['tmp_name'], $uploadDir . $image1);
        move_uploaded_file($_FILES['image_2']['tmp_name'], $uploadDir . $image2);
        $stmt = $this->pdo->prepare('UPDATE product SET productName = ?, price = ?, Image = ?, Image_1 = ?, Image_2 = ?, description = ?, quantity = ?, CategoryID = ? WHERE ProductID = ?');
        return $stmt->execute([$productName, $price, $image, $image1, $image2, $description, $quantity, $categoryID, $productId]);
    }

    public function deleteProduct($productId)
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM product WHERE ProductID = ?');
            $stmt->execute([$productId]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

}

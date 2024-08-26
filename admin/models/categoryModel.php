<?php

class CategoryModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    // Lấy tất cả danh mục
    public function getAllCategories()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM category');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin của một danh mục dựa trên ID
    public function getCategoryById($categoryId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM category WHERE CategoryID = ?");
            $stmt->execute([$categoryId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            return null;
        }
    }

    // Thêm mới một danh mục
    public function createCategory($categoryName)
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO category (CategoryName) VALUES (?)');
            $stmt->execute([$categoryName]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            // In ra thông báo lỗi để kiểm tra
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    // Cập nhật thông tin của một danh mục
    public function updateCategory($categoryId, $newData)
    {
        $fields = '';
        $values = [];
        foreach ($newData as $key => $value) {
            $fields .= $key . ' = ?, ';
            $values[] = $value;
        }
        $fields = rtrim($fields, ', ');
        $values[] = $categoryId;
        $stmt = $this->pdo->prepare("UPDATE category SET $fields WHERE CategoryID = ?");
        return $stmt->execute($values);
    }

    // Xóa một danh mục
    public function deleteCategory($categoryId)
    {
        $stmt = $this->pdo->prepare('DELETE FROM category WHERE CategoryID = ?');
        return $stmt->execute([$categoryId]);
    }


}


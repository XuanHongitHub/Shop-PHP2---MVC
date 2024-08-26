<?php
class ProductModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }


    public function getAllProducts()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM product ORDER BY ProductID DESC LIMIT 9');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getProductById($productId)
    {
        $query = "SELECT * FROM product WHERE ProductID = :productId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCategories()
    {
        $stmt = $this->pdo->prepare('SELECT CategoryID, CategoryName FROM category');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Comment Model
    public function addComment($customerId, $productId, $content, $commentDate)
    {
        try {
            // Chuẩn bị truy vấn SQL để chèn dữ liệu vào bảng comment
            $query = "INSERT INTO comment (CustomerID, ProductID, Content, CommentDate) VALUES (:customerId, :productId, :content, :commentDate)";
            $statement = $this->pdo->prepare($query);

            // Bind các giá trị vào truy vấn
            $statement->bindParam(':customerId', $customerId, PDO::PARAM_INT);
            $statement->bindParam(':productId', $productId, PDO::PARAM_INT);
            $statement->bindParam(':content', $content, PDO::PARAM_STR);
            $statement->bindParam(':commentDate', $commentDate, PDO::PARAM_STR);

            // Thực thi truy vấn
            $statement->execute();

            // Trả về true nếu thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function getCommentsByProductId($productId)
    {
        $query = "SELECT * FROM comment WHERE ProductID = :productId";
        $statement = $this->pdo->prepare($query);
        $statement->execute([':productId' => $productId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCustomerNameById($customerId)
    {
        $query = "SELECT CustomerName FROM users WHERE CustomerID = :customerId";
        $statement = $this->pdo->prepare($query);
        $statement->execute([':customerId' => $customerId]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['CustomerName'];
    }
    public function getDescriptionById($productId)
    {
        $sql = "SELECT Description FROM product WHERE ProductID = :productId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['Description'];
        } else {
            return false;
        }
    }
    public function getLatestCommentsByProductId($productId, $limit = 5)
    {
        $sql = "SELECT * FROM comment WHERE ProductID = :productId ORDER BY CommentDate DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
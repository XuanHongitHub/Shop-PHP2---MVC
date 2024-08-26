<?php

class UserModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    public function getAllUsers()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }


    // Lấy thông tin người dùng bằng ID
    public function getUserById($userId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE UserID = ?");
            $stmt->execute([$userId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            return null;
        }
    }

    // Lấy thông tin người dùng bằng tên đăng nhập
    public function getUserByUsername($username)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE Username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            return null;
        }
    }

}

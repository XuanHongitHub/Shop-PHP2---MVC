<?php
require_once 'vendor/autoload.php';
require_once('models/Database.php');

class AccountModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    public function getUserById($customerId)
    {
        $query = "SELECT * FROM users WHERE CustomerID = :customerId";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':customerId' => $customerId));

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
    public function updateUserData($customername, $email, $address, $phone)
    {
        try {
            $query = "UPDATE users SET CustomerName = :customername, Email = :email, Address = :address, PhoneNumber = :phone WHERE CustomerID = :customerId";
            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':customername', $customername);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':customerId', $_SESSION['CustomerID']);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error updating user data: " . $e->getMessage());
            return false;
        }
    }

}
?>
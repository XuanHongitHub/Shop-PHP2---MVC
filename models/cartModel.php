<?php
require_once('Database.php');

class CartModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    public function addToCart($customerId, $productId, $quantity)
    {
        $query = "SELECT * FROM cart WHERE CustomerID = :customerId AND ProductID = :productId";
        $statement = $this->pdo->prepare($query);
        $statement->execute([':customerId' => $customerId, ':productId' => $productId]);
        $existingItem = $statement->fetch(PDO::FETCH_ASSOC);

        if ($existingItem) {
            $quantityInCart = intval($existingItem['Quantity']);
            $newQuantity = $quantityInCart + intval($quantity);
            $query = "UPDATE cart SET Quantity = :quantity WHERE CartID = :cartId";
            $statement = $this->pdo->prepare($query);
            $statement->execute([':quantity' => $newQuantity, ':cartId' => $existingItem['CartID']]);
        } else {
            $query = "INSERT INTO cart (CustomerID, ProductID, Quantity) VALUES (:customerId, :productId, :quantity)";
            $statement = $this->pdo->prepare($query);
            $statement->execute([':customerId' => $customerId, ':productId' => $productId, ':quantity' => $quantity]);
        }

        header("Location: index.php?controller=cart&action=index");
        exit();
    }
    public function getCartItems($customerId)
    {
        $query = "SELECT cart.*, product.Image, product.ProductName, product.Price FROM cart JOIN product ON cart.ProductID = product.ProductID WHERE CustomerID = :customerId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':customerId' => $customerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateCart($cartData)
    {
        foreach ($cartData as $productId => $cartItem) {
            $quantity = $cartItem['quantity'];

            $query = "UPDATE cart SET Quantity = :quantity WHERE ProductID = :productId";
            $statement = $this->pdo->prepare($query);
            $statement->execute([':quantity' => $quantity, ':productId' => $productId]);
        }
    }
    public function deleteCart($productId, $customerId)
    {
        $query = "DELETE FROM cart WHERE ProductID = :productId AND CustomerID = :customerId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':productId' => $productId, ':customerId' => $customerId]);
    }
    public function clearCart()
    {
        $query = "DELETE FROM cart";

        $stmt = $this->pdo->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
?>
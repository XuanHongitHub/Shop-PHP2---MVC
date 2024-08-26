<?php
require_once('Database.php');

class ContactModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    public function sendMessage($name, $email, $subject, $phone, $message): bool
    {
        try {
            $query = "INSERT INTO contact (name, email, subject, phone, message) VALUES (:name, :email, :subject, :phone, :message)";
            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute([':name' => $name, ':email' => $email, ':subject' => $subject, ':phone' => $phone, ':message' => $message]);

            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
require_once('models/Database.php');

class AuthModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }
    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE Username = :username AND Password = :password";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':username' => $username, ':password' => $password));

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return true;
        } else {
            return false;
        }
    }
    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM users WHERE Username = :username";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($customerName, $username, $address, $phoneNumber, $email, $password)
    {
        // Thêm người dùng mới vào cơ sở dữ liệu
        $query = "INSERT INTO users (CustomerName, Username, Address, PhoneNumber, Email, Password) 
                  VALUES (:customerName, :username, :address, :phoneNumber, :email, :password)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(
            array(
                ':customerName' => $customerName,
                ':username' => $username,
                ':address' => $address,
                ':phoneNumber' => $phoneNumber,
                ':email' => $email,
                ':password' => $password
            )
        );

        return $this->pdo->lastInsertId(); // Trả về ID của người dùng mới được thêm vào
    }

    public function forgot($email)
    {
        // Tạo token mới
        $token = bin2hex(random_bytes(16));

        // Lưu token vào cơ sở dữ liệu với email tương ứng
        $query = "UPDATE users SET ResetToken = :token WHERE Email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':token' => $token, ':email' => $email));

        // Gửi email chứa token
        $mail = new PHPMailer(true); // Khởi tạo PHPMailer
        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nnxxhh2004@gmail.com'; // Địa chỉ email của bạn
            $mail->Password = 'tagxsmjroqcpiafu'; // Mật khẩu email của bạn
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Cấu hình email
            $mail->setFrom('nnxxhh2004@gmail.com', 'PHP2 Shop'); // Địa chỉ email và tên người gửi
            $mail->addAddress($email); // Địa chỉ email của người nhận
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password Request';
            $mail->Body = 'Please use the following token to reset your password: ' . $token; // Thông điệp chứa token

            // Gửi email
            $mail->send();
            return true; // Trả về true nếu gửi email thành công
        } catch (Exception $e) {
            return false; // Trả về false nếu gặp lỗi khi gửi email
        }
    }
    public function isValidToken($email, $token)
    {
        $query = "SELECT * FROM users WHERE Email = :email AND ResetToken = :token";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':email' => $email, ':token' => $token));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return($user !== false);
    }

    public function updatePassword($email, $newPassword)
    {
        // Mã hóa mật khẩu mới
        $hashedPassword = $newPassword;

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $query = "UPDATE users SET Password = :password, ResetToken = NULL WHERE Email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':password' => $hashedPassword, ':email' => $email));
    }
    public function deleteToken($email)
    {
        $query = "UPDATE users SET ResetToken = NULL WHERE Email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':email' => $email));
    }
}
?>
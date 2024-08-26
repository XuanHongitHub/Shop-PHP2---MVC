<?php
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['CustomerID'])) {
    // Nếu chưa đăng nhập, thiết lập thông báo và hiển thị
    $message = "Bạn cần phải đăng nhập hoặc đăng ký để mua hàng.";
    echo "<div style='text-align: center;' class='alert alert-info'>$message</div>";
} else {
    // Nếu đã đăng nhập, xử lý các logic tiếp theo
    $customerId = $_SESSION['CustomerID'];
    // Logic xử lý cho người dùng đã đăng nhập
}

?>
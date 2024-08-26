<?php
// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['CustomerID'])) {
    $customerId = $_SESSION['CustomerID'];
} else {
    // Nếu không có, gán giá trị false cho customerId
    $customerId = false;
}
?>
<?php include_once(realpath('') . '\\views\\layouts\\header.php'); ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Order</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--Checkout confirmation section-->
<div class="Checkout_confirmation">
    <div class="checkout_details_info">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h3>Billing Details</h3>
                <ul>
                    <li><strong>Customer ID:</strong>
                        <?= $order['CustomerID']; ?>
                    </li>
                    <li><strong>Customer Name:</strong>
                        <?= $order['CustomerName']; ?>
                    </li>
                    <li><strong>Customer Phone:</strong>
                        <?= $order['CustomerPhone']; ?>
                    </li>
                    <li><strong>Shipping Address:</strong>
                        <?= $order['ShippingAddress']; ?>
                    </li>
                    <li><strong>Order Note:</strong>
                        <?= $order['OrderNote']; ?>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <h3>Order Details</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderDetails as $detail): ?>
                            <tr>
                                <td>
                                    <?= $detail['ProductName']; ?>
                                </td>
                                <td>
                                    <?= $detail['Quantity']; ?>
                                </td>
                                <td>
                                    <?= $detail['UnitPrice']; ?>
                                </td>
                                <td>
                                    <?= $detail['Quantity'] * $detail['UnitPrice']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div><strong>Total Amount:</strong>
                    <?= $order['TotalAmount']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout confirmation section end-->

<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
<?php
if (isset($_SESSION['CustomerID'])) {
    $customerId = $_SESSION['CustomerID'];
} else {
    false;
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
                    <li>checkout</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section">
    <div class="checkout_form">
        <form action="index.php?controller=checkout&action=placeOrder" method="POST">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <input type="hidden" name="customer_id" value="<?= $customerId; ?>">
                        <div class="col-lg-12 mb-30">
                            <label>Full Name <span>*</span></label>
                            <input type="text" name="customer_name" required>
                        </div>
                        <div class="col-12 mb-30">
                            <label>Address <span>*</span></label>
                            <input placeholder="House number and street name" type="text" name="shipping_address"
                                required>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label>Phone<span>*</span></label>
                            <input type="text" name="customer_phone" required>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label> Email Address <span>*</span></label>
                            <input type="email" name="customer_email" required>
                        </div>
                        <div class="col-12">
                            <div class="ordernote">
                                <label for="ordernote">Order Notes</label>
                                <textarea id="ordernote" name="order_note"
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Your order</h3>
                    <div class="order_table table-responsive mb-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalAmount = 0; ?>
                                <?php foreach ($cartItems as $item): ?>
                                    <tr>
                                        <td>
                                            <?php echo isset($item['ProductName']) ? $item['ProductName'] : ''; ?>
                                        </td>
                                        <td>$
                                            <?php
                                            $subtotal = $item['Price'] * $item['Quantity'];
                                            $totalAmount += $subtotal;
                                            echo number_format($subtotal, 2);
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>TOTAL:</strong></td>
                                    <td>$
                                        <?php echo number_format($totalAmount, 2); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1) {
                        echo '<p class="success">Order successfully confirmed.!</p>';
                    }
                    ?>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<p class="error">Failed to confirm order.!</p>';
                    }
                    ?>
                    <div class="order_button">
                        <button type="submit">Confirm Order</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<!--Checkout page section end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
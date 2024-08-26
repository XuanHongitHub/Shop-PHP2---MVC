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
                    <li>Shopping Cart</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--shopping cart area start -->
<div class="shopping_cart_area">
    <form id="cartForm" action="index.php?controller=cart&action=update" method="post">
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td>
                                            <?php echo $order['OrderID']; ?>
                                        </td>
                                        <td>
                                            <?php echo '$' . $order['Total']; ?>
                                        </td>
                                        <td>
                                            <?php echo $order['PaymentStatus']; ?>
                                        </td>
                                        <td>
                                            <?php echo $order['OrderDate']; ?>
                                        </td>
                                        <td><a href="index.php?controller=order&action=view&orderId=<?php echo $order['OrderID']; ?>"
                                                class="view">View</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area start-->
        <!-- coupon code area end -->
    </form>
</div>
<!--shopping cart area end -->


</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\notifi.php'); ?>
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

                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($cartItems) && is_array($cartItems)) {
                                    foreach ($cartItems as $item) {
                                        ?>
                                        <tr>
                                            <td class="product_remove"><a href="#"
                                                    onclick="confirmDelete(<?php echo $item['ProductID']; ?>, <?php echo $customerId; ?>)"><i
                                                        class="fa fa-trash-o"></i></a></td>
                                            <td class="product_thumb"><a href="#"><img
                                                        src="<?php echo $uploadDir . $item['Image'] ?>" alt=""
                                                        style="max-width: 100px; max-height: 100px;"></a></td>
                                            <td class="product_name"><a href="#">
                                                    <?php echo isset($item['ProductName']) ? $item['ProductName'] : ''; ?>
                                                </a></td>
                                            <td class="product-price">
                                                <?php echo isset($item['Price']) ? $item['Price'] : ''; ?>
                                            </td>
                                            <td class="product_quantity">
                                                <input min="0" max="100"
                                                    value="<?php echo isset($item['Quantity']) ? $item['Quantity'] : ''; ?>"
                                                    type="number" name="cart[<?php echo $item['ProductID']; ?>][quantity]"
                                                    onchange="updateTotalPrice(this)">
                                            </td>


                                            <td class="product_total">
                                                <?php
                                                // Tính tổng giá trị của sản phẩm
                                                $total = isset($item['Price']) && isset($item['Quantity']) ? $item['Price'] * $item['Quantity'] : 0;
                                                echo $total;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart_submit">
                        <button type="submit" name="update_cart">Update Cart</button>
                        <button type="button" onclick="updateCartAndCheckout()">Update Cart & Checkout</button>
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
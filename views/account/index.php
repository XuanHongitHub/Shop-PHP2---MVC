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
                    <li>my account</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- Start Maincontent  -->
<section class="main_content_area">
    <div class="account_dashboard">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <!-- <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li> -->
                        <!-- <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li> -->
                        <li><a href="#account-details" data-toggle="tab" class="nav-link active">Account
                                details</a></li>
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                        <li><a href="index.php?controller=auth&action=logout" class="nav-link">logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade show active" id="account-details">
                        <h3>Account details</h3>
                        <?php
                        if (isset($_GET['success']) && $_GET['success'] == 1) {
                            echo '<p class="success">Update successful!</p>';
                        }
                        ?>
                        <?php
                        if (isset($_GET['error']) && $_GET['error'] == 1) {
                            echo '<p class="error">Please enter information before updating!</p>';
                        }
                        ?>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form id="account-update" action="
                                        index.php?controller=account&action=update" method="post">
                                        <label for="username">Username:</label>
                                        <input type="text" id="username" name="username" disabled
                                            value="<?php echo $userData['Username']; ?>">

                                        <label for="customername">Customer Name:</label>
                                        <input type="text" id="customername" name="customername" required
                                            value="<?php echo $userData['CustomerName']; ?>">
                                        <label class="error" for="customername"></label>

                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email"
                                            value="<?php echo $userData['Email']; ?>">
                                        <label class="error" for="email"></label>

                                        <label for="address">Address:</label>
                                        <input type="text" id="address" name="address"
                                            value="<?php echo $userData['Address']; ?>">
                                        <label class="error" for="address"></label>


                                        <label for="phone">Phone:</label>
                                        <input type="tel" id="phone" name="phone"
                                            value="<?php echo $userData['PhoneNumber']; ?>">
                                        <label class="error" for="phone"></label>

                                        <button type="submit"
                                            class="save_button primary_btn default_button">Update</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="orders">
                        <h3>Orders</h3>
                        <div class="coron_table table-responsive">
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

                    <div class="tab-pane fade" id="downloads">
                        <h3>Downloads</h3>
                        <div class="coron_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Downloads</th>
                                        <th>Expires</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shopnovilla - Free Real Estate PSD Template</td>
                                        <td>May 10, 2018</td>
                                        <td><span class="danger">Expired</span></td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Organic - ecommerce html template</td>
                                        <td>Sep 11, 2018</td>
                                        <td>Never</td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="address">
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <h4 class="billing-address">Billing address</h4>
                        <a href="#" class="view">Edit</a>
                        <p><strong>Bobby Jackson</strong></p>
                        <address>
                            House #15<br>
                            Road #1<br>
                            Block #C <br>
                            Banasree <br>
                            Dhaka <br>
                            1212
                        </address>
                        <p>Bangladesh</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Maincontent  -->
<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\header.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\topbar.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\sidebar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách chi tiết đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách chi tiết đơn hàng</h3>
                        </div>
                        <div class="card-body">
                            <table id="orderDetailsTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>OrderDetailID</th>
                                        <th>OrderID</th>
                                        <th>ProductID</th>
                                        <th>UnitPrice</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderDetails as $orderDetail): ?>
                                        <tr>
                                            <td>
                                                <?= $orderDetail['OrderDetailID'] ?>
                                            </td>
                                            <td>
                                                <?= $orderDetail['OrderID'] ?>
                                            </td>
                                            <td>
                                                <?= $orderDetail['ProductID'] ?>
                                            </td>
                                            <td>
                                                <?= $orderDetail['UnitPrice'] ?>
                                            </td>
                                            <td>
                                                <?= $orderDetail['Quantity'] ?>
                                            </td>
                                            <td>
                                                <?= $orderDetail['Total'] ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
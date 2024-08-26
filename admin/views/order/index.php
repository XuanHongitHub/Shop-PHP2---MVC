<?php include_once(realpath('') . '/views/layouts/header.php'); ?>
<?php include_once(realpath('') . '/views/layouts/topbar.php'); ?>
<?php include_once(realpath('') . '/views/layouts/sidebar.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Đơn Hàng</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="orderTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã HĐ</th>
                                        <th>Tên KH</th>
                                        <th>Trạng Thái</th>
                                        <th>Ngày</th>
                                        <th>Tổng</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <td>
                                                <?= $order['OrderID'] ?>
                                            </td>
                                            <td>
                                                <?= $order['CustomerName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $order['PaymentStatus']; ?>
                                            </td>
                                            <td>
                                                <?= $order['OrderDate'] ?>
                                            </td>
                                            <td>
                                                <?= $order['Total'] ?> $
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
    <?php include_once(realpath('') . '/views/layouts/footer.php'); ?>
</div>
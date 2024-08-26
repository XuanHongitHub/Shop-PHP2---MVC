<?php include_once(realpath('') . '\\views\\layouts\\header.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\topbar.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\sidebar.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Sản Phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh Sách Sản Phẩm</h3>
                            <a href="index.php?controller=product&action=create" class="btn btn-success btn-sm"
                                style="float: right;">Thêm
                                Sản
                                Phẩm</a>
                        </div>

                        <div class="card-body">
                            <?php
                            if (isset($_GET['success']) && $_GET['success'] == 1) {
                                echo '<p class="text-success">Xóa Sản Phẩm Thành Công!</p>';
                            }
                            ?>
                            <?php
                            if (isset($_GET['error']) && $_GET['error'] == 1) {
                                echo '<p class="text-danger">Sản Phẩm Này Không Thể Xóa!</p>';
                            }
                            ?>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Hình</th>

                                        <th>Mô Tả</th>
                                        <th>Số Lượng</th>
                                        <th>Danh Mục</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($products)) {
                                        foreach ($products as $product) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $product['ProductID'] ?>
                                                </td>
                                                <td>
                                                    <?= $product['ProductName'] ?>
                                                </td>
                                                <td>
                                                    <?= $product['Price'] ?>
                                                </td>
                                                <td><img src="<?= $uploadDir . $product['Image'] ?>" width="70"
                                                        alt="Product Image"></td>
                                                </td>

                                                <td width="300px">
                                                    <?= $product['Description'] ?>
                                                </td>
                                                <td>
                                                    <?= $product['Quantity'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach ($categories as $category) {
                                                        if ($category['CategoryID'] == $product['CategoryID']) {
                                                            echo $category['CategoryName'];
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a
                                                        href="<?= 'index.php?controller=product&action=update&productId=' . $product['ProductID'] ?>"><input
                                                            class="btn btn-warning btn-sm" type="button" value="Sửa"></a>

                                                    <a
                                                        href="<?= 'index.php?controller=product&action=delete&productId=' . $product['ProductID'] ?>"><input
                                                            onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                                                            class="btn btn btn-danger btn-sm" type="button" value="Xóa"></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="11">Không có dữ liệu</td></tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
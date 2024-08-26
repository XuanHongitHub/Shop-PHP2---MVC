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
                            <h3 class="card-title">Danh Mục</h3>
                            <a href="index.php?controller=category&action=create" class="btn btn-success btn-sm"
                                style="float: right;">Thêm
                                Danh Mục</a>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>CategoryID</th>
                                        <th>CategoryName</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category): ?>
                                        <tr>
                                            <td>
                                                <?= $category['CategoryID'] ?>
                                            </td>
                                            <td>
                                                <?= $category['CategoryName'] ?>
                                            </td>
                                            <td>

                                                <a href="index.php?controller=category&action=update&categoryId=<?= $category['CategoryID'] ?>"
                                                    class="btn btn-warning btn-sm">Sửa</a>
                                                <a href="index.php?controller=category&action=delete&categoryId=<?= $category['CategoryID'] ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')">Xóa</a>

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

    <?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
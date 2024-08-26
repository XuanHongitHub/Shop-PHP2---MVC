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
                            <h3 class="card-title">Thêm Danh Mục</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="index.php?controller=category&action=create"
                                onsubmit="return validateCategoryForm()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="CategoryName">Tên Danh Mục</label>
                                        <input type="text" class="form-control" id="CategoryName" name="CategoryName"
                                            placeholder="Nhập tên danh mục">
                                        <small id="categoryNameError" class="text-danger" style="display: none;">Vui
                                            lòng nhập tên danh mục!</small>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
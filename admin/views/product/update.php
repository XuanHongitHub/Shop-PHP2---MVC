<?php include_once(realpath('') . '\\views\\layouts\\header.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\topbar.php'); ?>
<?php include_once(realpath('') . '\\views\\layouts\\sidebar.php'); ?>
<?php if (isset($product['ProductName'])): ?>
    <?= $product['ProductName'] ?>
<?php endif; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập Nhật Sản Phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cập Nhật Sản Phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cập Nhật Sản Phẩm</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" onsubmit="return validateForm()"
                                action="index.php?controller=product&action=update&productId=<?= $products['ProductID'] ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" name="productId" value="<?= $products['ProductID'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="productName">Tên Sản Phẩm</label>
                                        <input type="text" class="form-control" id="productName" name="productName"
                                            placeholder="Nhập tên sản phẩm" value="<?= $products['ProductName'] ?>">
                                        <small id="productNameError" class="text-danger" style="display: none;">Vui lòng
                                            nhập tên sản phẩm!</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Giá</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            placeholder="Nhập giá sản phẩm" value="<?= $products['Price'] ?>">
                                        <small id="priceError" class="text-danger" style="display: none;">Vui lòng nhập
                                            giá sản phẩm!</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Hình Ảnh</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="image">Chọn tệp</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_1">Hình Ảnh 1</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image_1" name="image_1"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="image_1">Chọn tệp</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_2">Hình Ảnh 2</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image_2" name="image_2"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="image_2">Chọn tệp</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="description">Mô Tả</label>
                                        <textarea class="form-control" id="description" name="description"
                                            placeholder="Nhập mô tả sản phẩm"><?= $products['Description'] ?></textarea>
                                        <small id="descriptionError" class="text-danger" style="display: none;">Vui lòng
                                            nhập mô tả sản phẩm!</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Số Lượng</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            placeholder="Nhập số lượng sản phẩm" value="<?= $products['Quantity'] ?>">
                                        <small id="quantityError" class="text-danger" style="display: none;">Vui lòng
                                            nhập số lượng sản phẩm!</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="categoryID">Danh Mục</label>
                                        <select class="form-control" id="categoryID" name="categoryID">
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['CategoryID'] ?>"
                                                    <?= ($category['CategoryID'] == $products['CategoryID']) ? 'selected' : '' ?>>
                                                    <?= $category['CategoryName'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
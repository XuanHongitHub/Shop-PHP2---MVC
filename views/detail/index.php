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
                    <li>Detail Product</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<?php if (isset($data['product'])): ?>
    <?php $product = $data['product']; ?>
    <div class="product_details">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product_tab fix">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1"
                                    aria-selected="false"><img src="<?= $uploadDir . $product['Image'] ?>" alt=""></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2"
                                    aria-selected="false"><img src="<?= $uploadDir . $product['Image_1'] ?>" alt=""></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3"
                                    aria-selected="false"><img src="<?= $uploadDir . $product['Image_2'] ?>" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content produc_tab_c">
                        <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="<?= $uploadDir . $product['Image'] ?>" alt=""></a>
                                <div class="view_img">
                                    <a class="large_view" href="<?= $uploadDir . $product['Image'] ?>"><i
                                            class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="<?= $uploadDir . $product['Image_1'] ?>" alt=""></a>
                                <div class="view_img">
                                    <a class="large_view" href="<?= $uploadDir . $product['Image_1'] ?>"><i
                                            class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="<?= $uploadDir . $product['Image_2'] ?>" alt=""></a>
                                <div class="view_img">
                                    <a class="large_view" href="<?= $uploadDir . $product['Image_2'] ?>"> <i
                                            class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <h1>
                        <?php echo $product['ProductName']; ?>
                    </h1>
                    <div class="product_ratting mb-10">
                        <ul>
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <?php endfor; ?>
                            <li><a href="#"> Write a review </a></li>
                        </ul>
                    </div>
                    <div class="product_desc">
                        <p>
                            <?php echo $product['Description']; ?>
                        </p>
                    </div>

                    <div class="content_price mb-15">
                        <span>
                            <?php echo '$' . $product['Price']; ?>
                        </span>
                        <!-- Nếu có giá trị cho old-price -->
                        <?php if (isset($product['OldPrice'])): ?>
                            <span class="old-price">
                                <?php echo '$' . $product['OldPrice']; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="box_quantity mb-20">
                        <form id="addToCartForm"
                            action="index.php?controller=cart&action=add&customerId=<?php echo $customerId; ?>&id=<?php echo $product['ProductID']; ?>&quantity=1"
                            method="post" data-customer-id="<?php echo $customerId; ?>"
                            data-product-id="<?php echo $product['ProductID']; ?>">
                            <input type="hidden" name="productId" value="<?php echo $product['ProductID']; ?>">
                            <div class="box_quantity mb-20">
                                <label for="quantity">Quantity</label>
                                <input id="quantityInput" name="quantity" min="1" max="100" value="1" type="number"
                                    onchange="updateActionUrl()">
                                <button type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                <a href="#" title="Add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="wishlist-share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <p>Product not found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--product details end-->


    <!--product info start-->
    <div style="padding-top: 20px;" class="product_d_info">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="true">Reviews</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">More info</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="reviews" role="tabpanel">
                            <div class="comment-container">
                                <?php if (!empty($commentLimit)): ?>
                                    <?php foreach ($commentLimit as $comment): ?>
                                        <div class="product_info_inner">
                                            <!-- Hiển thị thông tin comment -->
                                            <div class="product_ratting mb-10">
                                                <strong>
                                                    <?php echo $customerName; ?>
                                                </strong>
                                                <p>
                                                    <?php echo isset($comment['CommentDate']) ? $comment['CommentDate'] : ''; ?>
                                                </p>
                                            </div>
                                            <div class="product_demo">
                                                <p>
                                                    <?php echo $comment['Content']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="product_review_form">
                                <form id="commentForm"
                                    action="index.php?controller=detail&action=comment&id=<?php echo $product['ProductID']; ?>"
                                    method="post">
                                    <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
                                    <h2>Add a review</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review</label>
                                            <textarea name="comment" id="review_comment" class="form-control"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="comments" role="tabpanel">
                            <div class="comment-container">
                                <?php foreach ($comments as $comment): ?>
                                    <div class="product_info_inner">
                                        <!-- Hiển thị thông tin comment -->
                                        <div class="product_ratting mb-10">
                                            <strong>
                                                <?php echo $customerName; ?>
                                            </strong>
                                            <p>
                                                <?php echo isset($comment['CommentDate']) ? $comment['CommentDate'] : ''; ?>
                                            </p>
                                        </div>
                                        <div class="product_demo">
                                            <p>
                                                <?php echo $comment['Content']; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <strong>Description:</strong>
                                <p>
                                    <?php echo $description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->
    <!--new product area start-->
    <div class="new_product_area product_page">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3> Other products category:</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                <?php
                $num_products = count($products);
                $num_columns = min($num_products, 20);
                for ($i = 0; $i < $num_columns; $i++):
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a
                                    href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>"><img
                                        src="<?= $uploadDir . $products[$i]['Image'] ?>" alt=""></a>
                                <div class="img_icone">
                                    <img src="../mvc/assets/img/cart/span-new.png" alt="">
                                </div>
                                <div class="product_action">
                                    <a
                                        href="index.php?controller=cart&action=add&customerId=<?php echo $customerId; ?>&id=<?php echo $products[$i]['ProductID']; ?>&quantity=1">
                                        <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">$
                                    <?php echo $products[$i]['Price']; ?>
                                </span>
                                <h3 class="product_title"><a
                                        href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>">
                                        <?php echo $products[$i]['ProductName']; ?>
                                    </a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="index.php?controller=cart&action=add&customerId=<?php echo $customerId; ?>&id=<?php echo $products[$i]['ProductID']; ?>&quantity=1"
                                            title="Thêm vào danh sách mong muốn">Add to cart</a>
                                    </li>
                                    <li><a href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>"
                                            title="Xem nhanh">View details </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <!--new product area start-->


    <!--new product area start-->
    <div class="new_product_area product_page">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3> Related Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                <?php
                $num_products = count($products);
                $num_columns = min($num_products, 20);
                for ($i = 0; $i < $num_columns; $i++):
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a
                                    href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>"><img
                                        src="<?= $uploadDir . $products[$i]['Image'] ?>" alt=""></a>
                                <div class="img_icone">
                                    <img src="../mvc/assets/img/cart/span-new.png" alt="">
                                </div>
                                <div class="product_action">
                                    <a
                                        href="index.php?controller=cart&action=add&customerId=<?php echo $customerId; ?>&id=<?php echo $products[$i]['ProductID']; ?>&quantity=1">
                                        <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">$
                                    <?php echo $products[$i]['Price']; ?>
                                </span>
                                <h3 class="product_title"><a
                                        href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>">
                                        <?php echo $products[$i]['ProductName']; ?>
                                    </a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="index.php?controller=cart&action=add&customerId=<?php echo $customerId; ?>&id=<?php echo $products[$i]['ProductID']; ?>&quantity=1"
                                            title="Thêm vào danh sách mong muốn">Add to cart</a>
                                    </li>
                                    <li><a href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>"
                                            title="Xem nhanh">View details </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <!--new product area start-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
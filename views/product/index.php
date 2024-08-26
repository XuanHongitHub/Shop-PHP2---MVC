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
                    <li>Products</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--pos home section-->
<div class=" pos_home_section">
    <div class="row pos_home">
        <div class="col-lg-3 col-md-12">
            <!--layere categorie"-->
            <div class="sidebar_widget shop_c">
                <div class="categorie__titile">
                    <h4>Categories</h4>
                </div>
                <div class="layere_categorie">
                    <ul>
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <!-- <input id="<?php echo strtolower($category['CategoryName']); ?>" type="checkbox"> -->
                                <label for="<?php echo strtolower($category['CategoryName']); ?>">
                                    <?php echo $category['CategoryName']; ?><span>
                                    </span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!--layere categorie end-->

            <!--color area start-->
            <!-- <div class="sidebar_widget color">
                <h2>Color</h2>
                <div class="widget_color">
                    <ul>

                        <li><a href="#">Black <span>(10)</span></a></li>

                        <li><a href="#">Orange <span>(12)</span></a></li>

                        <li> <a href="#">Blue <span>(14)</span></a></li>

                        <li><a href="#">Yellow <span>(15)</span></a></li>

                        <li><a href="#">pink <span>(16)</span></a></li>

                        <li><a href="#">green <span>(11)</span></a></li>

                    </ul>
                </div>
            </div> -->
            <!--color area end-->

            <!--price slider start-->
            <!-- <div class="sidebar_widget price">
                <h2>Price</h2>
                <div class="ca_search_filters">

                    <input type="text" name="text" id="amount">
                    <div id="slider-range"></div>
                </div>
            </div> -->
            <!--price slider end-->

            <!--wishlist block start-->
            <div class="sidebar_widget cart mb-30">
                <div class="block_title">
                    <h3><a href="#">Cart</a></h3>
                </div>
                <!-- Dùng một vòng lặp để hiển thị các sản phẩm trong giỏ hàng -->
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart_item">
                        <div class="cart_img">
                            <!-- Thay đường dẫn ảnh bằng đường dẫn thực tế của sản phẩm -->
                            <a href="#"><img src="<?php echo $uploadDir . $item['Image']; ?>" alt=""></a>

                        </div>
                        <div class="cart_info">
                            <!-- Hiển thị tên sản phẩm -->
                            <a href="#">
                                <?php echo $item['ProductName']; ?>
                            </a>
                            <!-- Hiển thị giá của sản phẩm -->
                            <span class="cart_price">
                                <?php echo $item['Price']; ?>
                            </span>
                            <!-- Hiển thị số lượng sản phẩm -->
                            <span class="quantity">Qty:
                                <?php echo $item['Quantity']; ?>
                            </span>
                        </div>
                        <div class="cart_remove">
                            <a onclick="confirmDelete(<?php echo $item['ProductID']; ?>, <?php echo $customerId; ?>)"
                                title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="block_content">
                    <!-- Hiển thị số lượng sản phẩm trong giỏ hàng -->
                    <p>
                        <?php echo count($cartItems); ?> products
                    </p>
                    <!-- Link tới trang giỏ hàng của bạn -->
                    <a href="index.php?controller=cart&action=index">» View Cart</a>
                </div>
            </div>

            <!--wishlist block end-->

            <!--popular tags area-->
            <div class="sidebar_widget tags  mb-30">
                <div class="block_title">
                    <h3>popular tags</h3>
                </div>
                <div class="block_tags">
                    <a href="#">ipod</a>
                    <a href="#">sam sung</a>
                    <a href="#">apple</a>
                    <a href="#">iphone 5s</a>
                    <a href="#">superdrive</a>
                    <a href="#">shuffle</a>
                    <a href="#">nano</a>
                    <a href="#">iphone 4s</a>
                    <a href="#">canon</a>
                </div>
            </div>
            <!--popular tags end-->

            <!--newsletter block start-->
            <div class="sidebar_widget newsletter mb-30">
                <div class="block_title">
                    <h3>newsletter</h3>
                </div>
                <form action="#">
                    <p>Sign up for your newsletter</p>
                    <input placeholder="Your email address" type="text">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
            <!--newsletter block end-->

            <!--special product start-->
            <div class="sidebar_widget special">
                <div class="block_title">
                    <h3>Special Products</h3>
                </div>
                <div class="special_product_inner mb-20">
                    <div class="special_p_thumb">
                        <a href="index.php?controller=home&action=product&id=<?php echo $product['ProductID']; ?>"><img
                                src="../mvc/assets/img\cart\cart3.jpg" alt=""></a>
                    </div>
                    <div class="small_p_desc">
                        <div class="product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h3><a href="index.php?controller=home&action=product&id=<?php echo $product['ProductID']; ?>">Lorem
                                ipsum dolor</a></h3>
                        <div class="special_product_proce">
                            <span class="old_price">$124.58</span>
                            <span class="new_price">$118.35</span>
                        </div>
                    </div>
                </div>
                <div class="special_product_inner">
                    <div class="special_p_thumb">
                        <a href="index.php?controller=home&action=product&id=<?php echo $product['ProductID']; ?>"><img
                                src="../mvc/assets/img\cart\cart18.jpg" alt=""></a>
                    </div>
                    <div class="small_p_desc">
                        <div class="product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h3><a href="index.php?controller=home&action=product&id=<?php echo $product['ProductID']; ?>">Printed
                                Summer</a></h3>
                        <div class="special_product_proce">
                            <span class="old_price">$124.58</span>
                            <span class="new_price">$118.35</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--special product end-->


        </div>
        <div class="col-lg-9 col-md-12">
            <!--banner slider start-->
            <div class="banner_slider mb-35">
                <img src="../mvc/assets/img\banner\bannner10.jpg" alt="">
            </div>
            <!--banner slider start-->

            <!--shop toolbar start-->
            <div class="shop_toolbar mb-35">

                <div class="list_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large"
                                aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i
                                    class="fa fa-th-list"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="page_amount">
                    <p>Showing 1–9 of 21 results</p>
                </div>

                <div class="select_option">
                    <!-- <form action="#">
                        <label>Sort By</label>
                        <select name="orderby" id="short">
                            <option selected="" value="1">Position</option>
                            <option value="1">Price: Lowest</option>
                            <option value="1">Price: Highest</option>
                            <option value="1">Product Name:Z</option>
                            <option value="1">Sort by price:low</option>
                            <option value="1">Product Name: Z</option>
                            <option value="1">In stock</option>
                            <option value="1">Product Name: A</option>
                            <option value="1">In stock</option>
                        </select>
                    </form> -->
                </div>
            </div>
            <!--shop toolbar end-->

            <!--shop tab product-->
            <div class="shop_tab_product">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="large" role="tabpanel">
                        <div class="row">
                            <?php
                            $num_products = count($products);
                            $num_columns = min($num_products, 50);

                            for ($i = 0; $i < $num_columns; $i++):
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a
                                                href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>">
                                                <img src="<?= $uploadDir . $products[$i]['Image'] ?>" alt="">
                                            </a>
                                            <div class="product_action">
                                                <a
                                                    href="index.php?controller=cart&action=add&customerId=<?php echo $customerId; ?>&id=<?php echo $products[$i]['ProductID']; ?>&quantity=1">
                                                    <i class="fa fa-shopping-cart"></i> Add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <span class="product_price">$
                                                <?php echo $products[$i]['Price']; ?>
                                            </span>
                                            <h3 class="product_title">
                                                <a
                                                    href="index.php?controller=detail&action=index&id=<?php echo $products[$i]['ProductID']; ?>">
                                                    <?php echo $products[$i]['ProductName']; ?>
                                                </a>
                                            </h3>
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

                            <div id="successPopup"
                                style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border: 1px solid black;">
                                <p>Sản phẩm đã được thêm vào giỏ hàng thành công!</p>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <!--shop tab product end-->

            <!--pagination style start-->
            <div class="space_style">

            </div>

            <!--pagination style end-->
        </div>
    </div>
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
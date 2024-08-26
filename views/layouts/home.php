<?php include_once 'header.php'; ?>

<!--pos home section-->
<div class="pos_home_section">
    <div class="row">
        <!--banner slider start-->
        <div class="col-12">
            <div class="banner_slider slider_two">
                <div class="slider_active owl-carousel">
                    <div class="single_slider" style="background-image: url(assets/img/slider/slider_2.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>fashion for you</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Cumque
                                    eligendi quia, ratione porro, nemo non.</p>
                                <a href="index.php?controller=product&action=index">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single_slider" style="background-image: url(assets/img/slider/slide_4.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>fashion for you</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Cumque
                                    eligendi quia, ratione porro, nemo non.</p>
                                <a href="index.php?controller=product&action=index">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single_slider" style="background-image: url(assets/img/slider/slider_3.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>fashion for you</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Cumque
                                    eligendi quia, ratione porro, nemo non.</p>
                                <a href="index.php?controller=product&action=index">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--banner slider start-->
        </div>
    </div>
    <!--new product area start-->
    <div class="new_product_area product_two">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3> New Products</h3>
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
                                <span class="product_price">
                                    $
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

    <!--banner area start-->
    <div class="banner_area banner_two">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="index.php?controller=product&action=index"><img src="assets\img\banner\banner7.jpg"
                            alt=""></a>
                    <div class="banner_title">
                        <p>Up to <span> 40%</span> off</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="index.php?controller=product&action=index"><img src="assets\img\banner\banner8.jpg"
                            alt=""></a>
                    <div class="banner_title title_2">
                        <p>sale off <span> 30%</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="index.php?controller=product&action=index"><img src="assets\img\banner\banner11.jpg"
                            alt=""></a>
                    <div class="banner_title title_3">
                        <p>sale off <span> 30%</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--featured product area start-->
    <div class="new_product_area product_two">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3> featured Products</h3>
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
                                <span class="product_price">
                                    $
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
    <!--featured product area start-->

    <!--blog area start-->
    <!-- <div class="blog_area blog_two">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="blog-details.html"><img src="assets\img\blog\blog3.jpg" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    <a href="index.php?controller=product&action=index">Tech</a>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                        <p>Distinctively simplify dynamic resources whereas prospective core
                            competencies. Objectively pursue multidisciplinary human capital for
                            interoperable.</p>
                        <div class="post_footer">
                            <div class="post_meta">
                                <ul>
                                    <li>Jun 20, 2018</li>
                                    <li>3 Comments</li>
                                </ul>
                            </div>
                            <div class="Read_more">
                                <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="blog-details.html"><img src="assets\img\blog\blog4.jpg" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    <a href="index.php?controller=product&action=index">Men</a>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                        <p>Distinctively simplify dynamic resources whereas prospective core
                            competencies. Objectively pursue multidisciplinary human capital for
                            interoperable.</p>
                        <div class="post_footer">
                            <div class="post_meta">
                                <ul>
                                    <li>Jun 20, 2018</li>
                                    <li>3 Comments</li>
                                </ul>
                            </div>
                            <div class="Read_more">
                                <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="blog-details.html"><img src="assets\img\blog\blog1.jpg" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    <a href="index.php?controller=product&action=index">Women</a>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                        <p>Distinctively simplify dynamic resources whereas prospective core
                            competencies. Objectively pursue multidisciplinary human capital for
                            interoperable.</p>
                        <div class="post_footer">
                            <div class="post_meta">
                                <ul>
                                    <li>Jun 20, 2018</li>
                                    <li>3 Comments</li>
                                </ul>
                            </div>
                            <div class="Read_more">
                                <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
    <!--blog area end-->

    <!--brand logo strat-->
    <div class="brand_logo brand_two">
        <div class="block_title">
            <h3>Brands</h3>
        </div>
        <div class="row">
            <div class="brand_active owl-carousel">
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="index.php?controller=product&action=index"><img src="assets\img\brand\brand1.jpg"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="index.php?controller=product&action=index"><img src="assets\img\brand\brand2.jpg"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="index.php?controller=product&action=index"><img src="assets\img\brand\brand3.jpg"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="index.php?controller=product&action=index"><img src="assets\img\brand\brand4.jpg"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="index.php?controller=product&action=index"><img src="assets\img\brand\brand5.jpg"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="index.php?controller=product&action=index"><img src="assets\img\brand\brand6.jpg"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand logo end-->
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
<!-- all js here -->

<?php include_once 'footer.php'; ?>
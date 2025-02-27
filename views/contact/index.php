<?php include_once(realpath('') . '\\views\\layouts\\header.php'); ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>contact</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--contact area start-->
<div class="contact_area">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="contact_message">
                <h3>Contact Form</h3>
                <?php
                // Kiểm tra nếu có thông báo thành công được truyền từ URL
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo '<p class="success">Your message has been sent successfully!</p>';
                }
                ?>

                <?php
                // Kiểm tra nếu có thông báo lỗi được truyền từ URL
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo '<p class="error">There was an error sending your message. Please try again later.</p>';
                }
                ?>
                <form id="contact-form" method="POST" action="index.php?controller=contact&action=sendMessage">
                    <div class="row">
                        <div class="col-lg-6">
                            <input id="name" name="name" placeholder="Name *" type="text">
                        </div>
                        <div class="col-lg-6">
                            <input id="email" name="email" placeholder="Email *" type="email">
                        </div>
                        <div class="col-lg-6">
                            <input id="subject" name="subject" placeholder="Subject *" type="text">
                        </div>
                        <div class="col-lg-6">
                            <input id="phone" name="phone" placeholder="Phone *" type="text">
                        </div>
                        <div class="col-12">
                            <div class="contact_textarea">
                                <textarea id="message" placeholder="Message *" name="message"
                                    class="form-control2"></textarea>
                            </div>
                            <button id="submit-btn" type="submit">Send Message</button>
                        </div>
                        <div class="col-12">
                            <p class="form-message"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="contact_message contact_info">
                <h3>contact us</h3>
                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est
                    notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.
                </p>
                <ul>
                    <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 NewYork City</li>
                    <li><i class="fa fa-phone"></i> <a href="#">Infor@roadthemes.com</a></li>
                    <li><i class="fa fa-envelope-o"></i> 0(1234) 567 890</li>
                </ul>
                <h3><strong>Working hours</strong></h3>
                <p><strong>Monday – Saturday</strong>: 08AM – 22PM</p>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->

<!--contact map start-->
<div class="contact_map">
    <div class="row">
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb" width="500" height="450" style="border:0"
                allowfullscreen=""></iframe>
        </div>
    </div>
</div>
<!--contact map end-->


</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
<?php include_once(realpath('') . '\\views\\layouts\\footer.php'); ?>
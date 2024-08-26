<!--footer area start-->
<div class="footer_area">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>About us</h3>
                        <p>PHP2 in Danang city offers trendy fashion and accessories for both men and women.
                        </p>
                        <div class="footer_widget_contect">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 116 Nguyen Huy Tuong, Danang, Vietnam
                            </p>

                            <p><i class="fa fa-mobile" aria-hidden="true"></i> 0839893573</p>
                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> hongnxpd09347@fpt.edu.vn
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>My Account</h3>
                        <ul>
                            <li><a href="index.php?controller=account&action=index">Your Account</a></li>
                            <li><a href="index.php?controller=cart&action=index">My cart</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>Informations</h3>
                        <ul>
                            <li><a href="index.php?controller=home&action=index">Our store(s)!</a></li>
                            <li><a href="index.php?controller=about&action=index">About us</a></li>
                            <li><a href="index.php?controller=contact&action=index">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>extras</h3>
                        <ul>
                            <li><a href="index.php?controller=home&action=index"> Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <ul>
                            <li><a href="index.php?controller=about&action=index"> about us </a></li>
                        </ul>
                        <p>Copyright &copy; 2018 <a href="index.php?controller=home&action=index">Pos Coron</a>. All
                            rights reserved. </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_social text-right">
                        <ul>
                            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                            <li><a class="pinterest" href="https://www.pinterest.com/"><i class="fa fa-pinterest-p"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer area end-->

<!-- modal area start -->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

<!-- modal area end -->




<!-- all js here -->
<script src="..\mvc\assets\js\vendor\jquery-1.12.0.min.js"></script>
<script src="..\mvc\assets\js\popper.js"></script>
<script src="..\mvc\assets\js\bootstrap.min.js"></script>
<script src="..\mvc\assets\js\ajax-mail.js"></script>
<script src="..\mvc\assets\js\plugins.js"></script>
<script src="..\mvc\assets\js\main.js"></script>
<script src="..\mvc\assets\js\bonus.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script>
    $(document).ready(function () {
        $('#commentForm form').submit(function (event) {
            // Ngăn chặn hành vi mặc định của form
            event.preventDefault();

            // Lấy dữ liệu từ form
            var formData = $(this).serialize();

            // Gửi dữ liệu form đến server bằng Ajax
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                    // Xử lý phản hồi từ server (nếu cần)
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi (nếu có)
                    console.log(error);
                }
            });
        });
    });
</script>

</body>

</html>
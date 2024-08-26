var currentPage = 1; 
var perPage = 9; 
function changePerPage() {
    var selectElement = document.getElementById("page_select");
    perPage = parseInt(selectElement.options[selectElement.selectedIndex].value);
    updatePage();
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        updatePage(); 
    }
}

function nextPage() {
  
    currentPage++;
    updatePage();
}

function updatePage() {
  
    document.getElementById("current_page").innerHTML = currentPage;
    
    updateProductList(currentPage, perPage); 
}

function showSuccessPopup() {
    var popup = document.getElementById("successPopup");
    popup.style.display = "block";
}

function hideSuccessPopup() {
    var popup = document.getElementById("successPopup");
    popup.style.display = "none";
}


function confirmDelete(productId, customerId) {
    if (confirm('Bạn có chắc chắn muốn xóa mục này khỏi giỏ hàng không?')) {
        window.location.href = "index.php?controller=cart&action=delete&productId=" + productId + "&customerId=" + customerId;
    }
}
function confirmDelete(productId, customerId) {
    if (confirm('Bạn có chắc chắn muốn xóa mục này khỏi giỏ hàng không?')) {
        window.location.href = "index.php?controller=product&action=delete&productId=" + productId + "&customerId=" + customerId;
    }
}
// Lắng nghe sự kiện khi số lượng sản phẩm thay đổi
document.addEventListener('change', function(e) {
    if (e.target && e.target.classList.contains('product_quantity')) {
        // Lấy số lượng sản phẩm mới
        var quantity = parseInt(e.target.value);

        // Lấy giá sản phẩm
        var price = parseFloat(e.target.parentNode.previousElementSibling.textContent);

        // Tính toán tổng giá trị mới
        var total = quantity * price;

        // Cập nhật tổng giá trị trong cột "Total" của sản phẩm tương ứng
        e.target.parentNode.nextElementSibling.textContent = total;
    }
});
function updateTotalPrice(input) {
    // Lấy giá trị mới của số lượng và giá sản phẩm
    var quantity = parseInt(input.value);
    var price = parseFloat(input.parentNode.previousElementSibling.innerText);

    // Tính toán tổng giá trị mới
    var totalPrice = quantity * price;

    // Cập nhật tổng giá trị vào ô hiển thị
    input.parentNode.nextElementSibling.innerText = totalPrice.toFixed(2);
}
function updateCartAndCheckout() {
    // Lấy form từ tài liệu HTML bằng ID
    var form = document.getElementById('cartForm');

    // Kiểm tra xem form có tồn tại không trước khi tạo FormData
    if (form) {
        // Gửi yêu cầu cập nhật giỏ hàng bằng AJAX hoặc fetch API
        // Sau khi cập nhật thành công, chuyển hướng đến trang thanh toán
        // Ví dụ:
        fetch('index.php?controller=cart&action=update', {
            method: 'POST',
            body: new FormData(form)
        }).then(response => {
            if (response.ok) {
                window.location.href = 'index.php?controller=checkout&action=index';
            } else {
                console.error('Failed to update cart');
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    } else {
        console.error('Form not found');
    }
}
// Kiểm tra nếu trường số lượng rỗng, gán giá trị mặc định là 1
if ($('#quantityInput').val() === '') {
    $('#quantityInput').val(1);
}

function updateActionUrl() {
    var quantity = document.getElementById('quantityInput').value;
    var form = document.getElementById('addToCartForm');
    var customerId = form.getAttribute('data-customer-id');
    var productId = form.getAttribute('data-product-id');
    var actionUrl = "index.php?controller=cart&action=add&customerId=" + customerId + "&id=" + productId + "&quantity=" + quantity;
    form.action = actionUrl;
}


$(document).ready(function() {
    $('#commentForm').validate({
        rules: {
            comment: {
                required: true,
                minlength: 5 // Độ dài tối thiểu là 5 ký tự
            }
        },
        messages: {
            comment: {
                required: "Please enter your review.",
                minlength: "Your review must be at least 5 characters long."
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});

$(document).ready(function() {
    $('#account-update').validate({
        rules: {
            customername: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10
            }
        },
        messages: {
            customername: {
                required: "Please enter customer name"
            },
            email: {
                required: "Please enter email",
                email: "Invalid email format"
            },
            address: {
                required: "Please enter address"
            },
            phone: {
                required: "Please enter phone number",
                digits: "Please enter only digits",
                minlength: "Phone number must be at least 10 digits"
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        }
    });
});

$(document).ready(function() {
    $('#contact-form').submit(function(event) {
        // Ngăn chặn hành động mặc định của form
        event.preventDefault();

        // Lấy giá trị từ các trường nhập liệu
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var phone = $('#phone').val();
        var message = $('#message').val();

        // Kiểm tra xem các trường có bị bỏ trống không
        if (name == '' || email == '' || subject == '' || phone == '' || message == '') {
            $('.form-message').text('Vui lòng điền đầy đủ thông tin vào các trường!');
            return;
        }

        // Kiểm tra định dạng email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $('.form-message').text('Vui lòng nhập địa chỉ email hợp lệ!');
            return;
        }

        // Nếu dữ liệu hợp lệ, gửi form
        this.submit();
    });
});


function validateCategoryForm() {
    var categoryName = document.getElementById("CategoryName").value;
    var categoryNameError = document.getElementById("categoryNameError");
    var isValid = true; // Biến để kiểm tra tính hợp lệ của mẫu

    // Kiểm tra trường categoryName
    if (categoryName.trim() == "") {
        categoryNameError.style.display = "block";
        isValid = false; // Đánh dấu mẫu không hợp lệ
    } else {
        categoryNameError.style.display = "none";
    }

    return isValid; // Trả về kết quả kiểm tra tính hợp lệ của mẫu
}
function validateForm() {
    var productName = document.getElementById("productName").value;
    var price = document.getElementById("price").value;
    var description = document.getElementById("description").value;
    var quantity = document.getElementById("quantity").value;
    var productNameError = document.getElementById("productNameError");
    var priceError = document.getElementById("priceError");
    var descriptionError = document.getElementById("descriptionError");
    var quantityError = document.getElementById("quantityError");
    var isValid = true; // Biến để kiểm tra tính hợp lệ của mẫu

    // Kiểm tra trường productName
    if (productName.trim() == "") {
        productNameError.style.display = "block";
        isValid = false; // Đánh dấu mẫu không hợp lệ
    } else {
        productNameError.style.display = "none";
    }

    // Kiểm tra trường price
    if (price.trim() == "") {
        priceError.style.display = "block";
        isValid = false; // Đánh dấu mẫu không hợp lệ
    } else {
        priceError.style.display = "none";
    }

    // Kiểm tra trường description
    if (description.trim() == "") {
        descriptionError.style.display = "block";
        isValid = false; // Đánh dấu mẫu không hợp lệ
    } else {
        descriptionError.style.display = "none";
    }

    // Kiểm tra trường quantity
    if (quantity.trim() == "") {
        quantityError.style.display = "block";
        isValid = false; // Đánh dấu mẫu không hợp lệ
    } else {
        quantityError.style.display = "none";
    }

    return isValid; // Trả về kết quả kiểm tra tính hợp lệ của mẫu
}


function confirmDeleteComment(productId, customerId) {
    if (confirm('Bạn có chắc chắn muốn xóa mục này khỏi giỏ hàng không?')) {
        window.location.href = "index.php?controller=cart&action=delete&productId=" + productId + "&customerId=" + customerId;
    }
}

<?php
require_once('baseController.php');
require_once('models/productModel.php');
require_once('models/Database.php');

class DetailController extends BaseController
{
    private $product;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->product = new ProductModel($db);
        $this->folder = 'detail';
    }

    public function index()
    {
        $productId = $_GET['id'];
        $productDetails = $this->product->getProductById($productId);
        $comments = $this->product->getCommentsByProductId($productId);
        $commentLimit = $this->product->getLatestCommentsByProductId($productId);


        if (isset($_SESSION['CustomerID'])) {
            $customerId = $_SESSION['CustomerID'];
            $customerName = $this->product->getCustomerNameById($customerId);
        } else {
            $customerName = "Khách vãng lai";
        }

        $description = $this->product->getDescriptionById($productId);

        if ($productDetails) {
            $data['products'] = $this->product->getAllProducts();
            $data['comments'] = $comments;
            $data['commentLimit'] = $commentLimit;
            $data['customerName'] = $customerName;
            $data['uploadDir'] = $this->uploadDir;
            $data['product'] = $productDetails;
            $data['description'] = $description;
            $this->render('index', $data);
        } else {
            $this->error();
        }
    }


    public function comment()
    {
        $productId = $_GET['id'];
        $customerId = $_POST['customerId'];

        if (isset($_POST['submit'])) {
            $content = $_POST['comment'];
            $commentDate = date('Y-m-d H:i:s');

            $success = $this->product->addComment($customerId, $productId, $content, $commentDate);

            if ($success) {
                header("Location: index.php?controller=detail&action=index&id=$productId#reviews");
                exit();
            } else {
                echo "Thêm comment không thành công.";
            }
        } else {
        }
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}

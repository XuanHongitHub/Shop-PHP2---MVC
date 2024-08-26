<?php
require_once('baseController.php');
require_once('models/authModel.php');
require_once('models/Database.php');

class AuthController extends BaseController
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->auth = new AuthModel($db);
        $this->folder = 'auth';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $authenticated = $this->auth->login($username, $password);
            if ($authenticated) {
                $user = $this->auth->getUserByUsername($username);

                $_SESSION['logged_in'] = true;
                $_SESSION['CustomerID'] = $user['CustomerID'];
                header('Location: index.php?controller=home&action=index');
                exit;
            } else {
                echo "Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.";
                $this->render('login');
            }
        } else {
            $this->render('login');
        }
    }

    public function logout()
    {
        unset($_SESSION['logged_in']);
        unset($_SESSION['CustomerID']);
        header('Location: index.php?controller=home&action=index');
        exit();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customerName'];
            $username = $_POST['username'];
            $address = $_POST['address'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $customerId = $this->auth->register($customerName, $username, $address, $phoneNumber, $email, $password);
            if ($customerId) {
                header('Location: index.php?controller=auth&action=login');
                exit();
            } else {
                $error = "Đã có lỗi xảy ra trong quá trình đăng ký. Vui lòng thử lại sau.";
                $this->render('register', ['error' => $error]);
            }
        } else {
            $this->render('register');
        }
    }

    public function forgot()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $result = $this->auth->forgot($email);
                if ($result) {
                    header('Location: index.php?controller=auth&action=enterToken&email=' . urlencode($email));
                    exit();
                } else {
                    echo "Failed to send email. Please try again.";
                }
            } else {
                echo "Missing parameters. Please try again.";
            }
        } else {
            $this->render('forgot');
        }
    }
    public function enterToken()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['token'])) {
                $email = $_POST['email'];
                $token = $_POST['token'];
                if ($this->auth->isValidToken($email, $token)) {
                    header('Location: index.php?controller=auth&action=create&email=' . urlencode($email) . '&token=' . urlencode($token));
                    exit();
                } else {
                    echo "Invalid token. Please try again.";
                }
            } else {
                echo "Missing parameters. Please try again.";
            }
        } else {
            $email = isset($_GET['email']) ? $_GET['email'] : '';
            $this->render('enterToken', ['email' => $email]);
        }
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email'], $_POST['token'], $_POST['newPassword'])) {
                $email = $_POST['email'];
                $token = $_POST['token'];
                $newPassword = $_POST['newPassword'];

                if (!empty($email) && !empty($token)) {
                    if ($this->auth->isValidToken($email, $token)) {
                        $this->auth->updatePassword($email, $newPassword);
                        $this->auth->deleteToken($email);
                        header('Location: index.php?controller=auth&action=login');
                        exit();
                    } else {
                        echo "Invalid token. Please try again.";
                    }
                } else {
                    echo "Missing email or token. Please try again.";
                }
            } else {
                echo "Missing parameters. Please try again.";
            }
        } else {
            $this->render('create');
        }
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}

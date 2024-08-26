<?php
require_once('BaseController.php');
require_once('models/contactModel.php');


class ContactController extends BaseController
{
    private $contactModel;

    public function __construct()
    {
        parent::__construct();
        $db = new Database();
        $this->contactModel = new ContactModel($db);
        $this->folder = 'contact';
    }

    public function index()
    {
        $this->render('index');
    }

    public function sendMessage()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];

            $messageSentSuccessfully = $this->contactModel->sendMessage($name, $email, $subject, $phone, $message);

            if ($messageSentSuccessfully) {
                header("Location: index.php?controller=contact&action=index&success=1");
                exit();
            } else {
                header("Location: index.php?controller=contact&action=index&error=1");
                exit();
            }
        }
    }

}
?>
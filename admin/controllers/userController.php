<?php
require_once('baseController.php');
require_once('models/UserModel.php');
require_once('models/Database.php');

class UserController extends BaseController
{
    private $user;

    public function __construct()
    {
        $db = new Database();
        $this->user = new UserModel($db);
        $this->folder = 'user';
    }

    public function index()
    {
        $data['users'] = $this->user->getAllUsers();
        $this->render('index', $data);
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }

}

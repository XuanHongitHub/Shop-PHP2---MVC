<?php
require_once('baseController.php');
require_once('models/Database.php');


class AboutController extends BaseController
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->folder = 'about';
    }

    public function index()
    {
        $this->render('index');

    }

    public function error()
    {
        require "./views/layouts/error.php";
    }
}

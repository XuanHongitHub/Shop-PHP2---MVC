<?php
require_once('baseController.php');
require_once('models/CommentModel.php');
require_once('models/Database.php');

class CommentController extends BaseController
{
    private $commentModel;

    public function __construct()
    {
        $db = new Database();
        $this->commentModel = new CommentModel($db);
        $this->folder = 'comment';
    }

    public function index()
    {
        $comments = $this->commentModel->getAllComments();

        $data['comments'] = $comments;
        $this->render('index', $data);
    }
    public function delete($commentId)
    {
        if (!isset($commentId) || empty($commentId)) {
            header('Location: index.php?controller=comment&action=index&error=1');
            exit();
        }

        $deleted = $this->commentModel->deleteComment($commentId);

        if ($deleted) {
            header('Location: index.php?controller=comment&action=index&success=1');
            exit();
        } else {
            header('Location: index.php?controller=comment&action=index&error=1');
            exit();
        }
    }
    public function error()
    {
        require "./views/layouts/error.php";
    }
}
?>
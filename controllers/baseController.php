<?php
class BaseController
{
  protected $folder;
  protected $uploadDir;

  public function __construct()
  {
    $this->uploadDir = 'assets/upload/';
  }

  public function render($file, $data = array())
  {
    $view_file = str_replace('controllers', '', __DIR__) . 'views/' . ((!is_null($this->folder)) ? ($this->folder . '/' . $file . '.php') : ($file . '.php'));
    if (is_file($view_file)) {
      if (!is_null($data)) {
        extract($data);
        require_once($view_file);
      } else {
        require_once($view_file);
      }
    }
  }
}
?>
<?php
class BaseController
{
  protected $folder; // Biến có giá trị là thư mục nào đó trong thư mục views, chứa các file view template của phần đang truy cập.
  protected $uploadDir;

  public function __construct()
  {
    $this->uploadDir = '../assets/upload/';
  }

  // Hàm hiển thị kết quả ra cho người dùng.
  public function render($file, $data = array())
  {
    // Kiểm tra file gọi đến có tồn tại hay không?
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
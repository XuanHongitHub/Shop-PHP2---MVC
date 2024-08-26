<?php

class CommentModel
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getPDO();
    }

    // Lấy tất cả các comment từ cơ sở dữ liệu
    public function getAllComments()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM comment');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteComment($commentId)
    {
        try {
            // Chuẩn bị câu lệnh SQL để xóa comment với commentId được truyền vào
            $stmt = $this->pdo->prepare('DELETE FROM comment WHERE CommentID = ?');
            // Bind giá trị cho tham số trong câu lệnh SQL
            $stmt->bindValue(1, $commentId, PDO::PARAM_INT);
            // Thực thi câu lệnh SQL
            $stmt->execute();
            // Trả về true nếu xóa thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            // In ra thông báo lỗi để kiểm tra
            echo "Error: " . $e->getMessage();
            // Trả về false nếu xóa không thành công
            return false;
        }
    }


}

?>
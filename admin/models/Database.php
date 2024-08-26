<?php
class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=shopphp2', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function getPDO()
    {
        return $this->pdo;
    }


}
?>
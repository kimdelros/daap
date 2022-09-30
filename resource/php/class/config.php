<?php

class config{
    private $host = '127.0.0.1:3306';
    private $db = 'daap';
    private $user = 'root';
    private $password = '';
    public $pdo = null;

    public function con(){
        try {
            $this->pdo = new PDO('mysql:host='.$this->$host.';dbname='.$this->$db, $this->user, $this->password);
            } catch (PDOException $e) {
                die($e->getMessage());
        }
        return $this->pdo;

    }
}

 ?>

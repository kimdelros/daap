<?php

class config{

    public function con(){
      $host = '127.0.0.1:3306';
      $db = 'daap';
      $user = 'root';
      $password = '';
      $pdo = null;

        try {
            $pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
            } catch (PDOException $e) {
                die($e->getMessage());
        }
        return $pdo;

    }
}

 ?>

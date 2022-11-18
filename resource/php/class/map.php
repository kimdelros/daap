<?php

class registerAccount{
    private $host = '127.0.0.1:3306';
    private $db = 'map';
    private $user = 'root';
    private $password = '';
    private $pdo = null;

    public function addAlumni(){
    try {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
        } catch (PDOException $e) {
            die($e->getMessage());
    }

        $sql = "SELECT * FROM `tbl_accounts` WHERE `username` = '$username'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}
?>
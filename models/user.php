<?php

class User {

    private $conn;
    private $table = "dashboard_users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil user berdasarkan username
    public function getByUsername($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

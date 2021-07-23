<?php

namespace App\Models;

use App\Core\Database;

class UserModel {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert($data) {
        $query = "INSERT INTO " . $table . "(name, secondary_id) " .
            "VALUES(:name, :secondary_id)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('secondary_id', $data['secondary_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUser($id) {
        $query = "SELECT * FROM " . $table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}

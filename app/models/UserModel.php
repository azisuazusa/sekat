<?php

class UserModel {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert($data) {
        $query = "INSERT INTO users(name, secondary_id) " .
            "VALUES(:name, :secondary_id)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('secondary_id', $data['secondary_id']);
        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function getUserBySecondaryId($secondaryId) {
        $query = "SELECT * FROM users WHERE secondary_id = :secondary_id";
        $this->db->query($query);
        $this->db->bind('secondary_id', $secondaryId);
        return $this->db->single();
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}

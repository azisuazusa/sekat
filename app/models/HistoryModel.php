<?php

namespace App\Models;

use App\Core\Database;

class HistoryModel {
    private $table = 'histories';
    private $db;

    public function __contruct() {
        $this->db = new Database();
    }

    public function insert($data) {
        $query = "INSERT INTO " . $table . "(answerer_user_id, answer, is_correct, question_id) " .
            "VALUES(:answerer_user_id, :answer, :is_correct, :question_id)";
        $this->db->query($query);
        $this->db->bind('answerer_user_id', $data['answerer_user_id']);
        $this->db->bind('answer', $data['answer']);
        $this->db->bind('is_correct', $data['is_correct']);
        $this->db->bind('question_id', $data['question_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($id, $data) {
        $query = "UPDATE " . $table . "SET ".
            "answerer_user_id = :answerer_user_id," .
            "answer = :answer," .
            "is_correct = :is_correct," .
            "question_id = :question_id," .
            "WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('answerer_user_id', $data['answerer_user_id']);
        $this->db->bind('answer', $data['answer']);
        $this->db->bind('is_correct', $data['is_correct']);
        $this->db->bind('question_id', $data['question_id']);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getHistoriesByAnswererUserIdAndUserId($answererUserId, $userId) {
        $query = "SELECT * FROM " . $table . " " .
            "INNER JOIN questions ON questions.id = histories.question_id " .
            "WHERE histories.answerer_user_id = :answerer_user_id " .
            "AND questions.user_id = :user_id";

        $this->db->query($query);
        $this->db->bind('answerer_user_id', $answererUserId);
        $this->db->bind('user_id', $userId);
        return $this->db->resultSet();
    }

    public function getHistoriesByUserIdGroupByAnswererUserId($userId) {
        $query = "SELECT * FROM " . $table . " " .
            "INNER JOIN questions ON questions.id = histories.question_id " .
            "WHERE questions.user_id = :user_id " .
            "GROUP BY histories.answerer_user_id";

        $this->db->query($query);
        $this->db->bind('user_id', $userId);
        return $this->db->resultSet();
    }
}

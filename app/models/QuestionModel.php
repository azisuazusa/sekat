<?php

class QuestionModel {
    private $table = 'questions';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert($data) {
        $query = "INSERT INTO questions(user_id, question, answer_a, answer_b, answer_c, answer_d, correct_answer) " .
            "VALUES(:user_id, :question, :answer_a, :answer_b, :answer_c, :answer_d, :correct_answer)";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('question', $data['question']);
        $this->db->bind('answer_a', $data['answer_a']);
        $this->db->bind('answer_b', $data['answer_b']);
        $this->db->bind('answer_c', $data['answer_c']);
        $this->db->bind('answer_d', $data['answer_d']);
        $this->db->bind('correct_answer', $data['correct_answer']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($id, $data) {
        $query = "UPDATE questionsSET ".
            "user_id = :user_id," .
            "question = :question," .
            "answer_a = :answer_a," .
            "answer_b = :answer_b," .
            "answer_c = :answer_c," .
            "answer_d = :answer_d," .
            "correct_answer = :correct_answer " .
            "WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('question', $data['question']);
        $this->db->bind('answer_a', $data['answer_a']);
        $this->db->bind('answer_b', $data['answer_b']);
        $this->db->bind('answer_c', $data['answer_c']);
        $this->db->bind('answer_d', $data['answer_d']);
        $this->db->bind('correct_answer', $data['correct_answer']);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id) {
        $query = "DELETE FROM questions WHERE id = :id";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPreviousQuestionByIdAndSecondaryId($id, $secondaryId) {
        $query = "SELECT * FROM questions " .
            "INNER JOIN users ON users.id = questions.user_id " .
            "WHERE questions.id < :id AND users.secondary_id = :secondary_id " .
            "ORDER BY questions.id DESC";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('secondary_id', $secondaryId);
        return $this->db->single();
    }

    public function getNextQuestionByIdAndSecondaryId($id, $secondaryId) {
        $query = "SELECT * FROM questions " .
            "INNER JOIN users ON users.id = questions.user_id " .
            "WHERE questions.id > :id AND users.secondary_id = :secondary_id " .
            "ORDER BY questions.id ASC";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('secondary_id', $secondaryId);
        return $this->db->single();
    }

    public function getQuestionsBySecondaryId($secondaryId) {
        $query = "SELECT * FROM questions " .
            "INNER JOIN users ON users.id = questions.user_id " .
            "WHERE users.secondary_id = :secondary_id " .
            "ORDER BY questions.id ASC";

        $this->db->query($query);
        $this->db->bind('secondary_id', $secondaryId);
        return $this->db->resultSet();
    }
}

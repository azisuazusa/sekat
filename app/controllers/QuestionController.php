<?php

use App\Core\Controller;

class QuestionController extends Controller {

    public function insert($data) {
        $insert = $this->model('QuestionModel')->insert($data);
        echo json_encode([
            'success' => $insert > 0
        ]);
    }

    public function update($id, $data) {
        $update = $this->model('QuestionModel')->update($id, $data);
        echo json_encode([
            'success' => $update > 0
        ]);
    }

    public function delete($id) {
        $delete = $this->model('QuestionModel')->delete($id);
        echo json_encode([
            'success' => $delete > 0
        ]);
    }

    public function previous($id, $secondaryId) {
        $question = $this->model('QuestionModel')->getPreviousQuestionByIdAndSecondaryId($id, $secondaryId);

        echo json_encode([
            'success' => $question == false,
            'data' => $question
        ]);
    }

    public function next($id, $secondaryId) {
        $question = $this->model('QuestionModel')->getNextQuestionByIdAndSecondaryId($id, $secondaryId);

        echo json_encode([
            'success' => $question == false,
            'data' => $question
        ]);
    }

    public function questions($secondaryId) {
        $questions = $this->model('QuestionModel')->getQuestionsBySecondaryId($secondaryId);

        echo json_encode([
            'success' => $questions == false,
            'data' => $questions
        ]);
    }
}

<?php

class HistoryController extends Controller {

    public function score($answererUserId, $secondaryId) {
        $user = $this->model('UserModel')->getUserBySecondaryId($secondaryId);
        $questions = $this->model('QuestionModel')->getQuestionsBySecondaryId($secondaryId);
        $histories = $this->model('HistoryModel')->getHistoriesByAnswererUserIdAndUserId($answererUserId, $user->id);

        $correctAnswer = array_filter($histories, function($v, $k) {
            return $v->is_correct == true;
        });
        $score = count($correctAnswer) * (count($questions) / 100);

        $questionsResult = array_map(function($v) {
            return [
                'question' => $v->question,
                'answerer_answer' => $v->answer,
                'is_correct' => $v->is_correct,
                'correct_answer' => $v->correct_answer
            ];
        }, $histories);

        $historiesGroupByAnswererId = $this->model('HistoryModel')->getHistoriesByUserIdGroupByAnswererUserId($user->id);
        $scoreBoard = array_map(function($v) {
            return [
                'name' => $v->name,
                'score' => $v->correct_answer * (count($questions) / 100)
            ];
        }, $historiesGroupByAnswererId);

        echo json_encode([
            'success' => true,
            'data' => [
                'questioner_name' => $user->name,
                'score' => $score,
                'questions' => $questionsResult,
                'score_board' => $scoreBoard
            ]
        ]);
    }

    public function insert($data) {
        $insert = $this->model('HistoryModel')->insert($data);
        echo json_encode([
            'success' => $insert > 0
        ]);
    }

    public function update($id, $data) {
        $update = $this->model('HistoryModel')->update($id, $data);
        echo json_encode([
            'success' => $update > 0
        ]);
    }
}

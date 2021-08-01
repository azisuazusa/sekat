<?php

class HistoryController extends Controller {

    public function score($secondaryId, $answererUserId) {
        $user = $this->model('UserModel')->getUserBySecondaryId($secondaryId);
        $questions = $this->model('QuestionModel')->getQuestionsBySecondaryId($secondaryId);
        $questionsLength = count($questions);
        $histories = $this->model('HistoryModel')->getHistoriesByAnswererUserIdAndUserId($answererUserId, $user['id']);

        $correctAnswer = array_filter($histories, function($v) {
            return $v['is_correct'] == "1";
        });
        $score = count($correctAnswer) * (100 / $questionsLength);

        $questionsResult = array_map(function($v) {
            return [
                'question' => $v['question'],
                'answerer_answer' => $v['answer'],
                'is_correct' => $v['is_correct'],
                'correct_answer' => $v['correct_answer']
            ];
        }, $histories);

        $historiesGroupByAnswererId = $this->model('HistoryModel')->getHistoriesByUserIdGroupByAnswererUserId($user['id']);
        $scoreBoard = array_map(function($v) use ($questionsLength) {
            return [
                'name' => $v['name'],
                'score' => $v['correct_answer'] * (100 / $questionsLength)
            ];
        }, $historiesGroupByAnswererId);

        $data = [
            'questioner_name' => $user['name'],
            'score' => $score,
            'questions' => $questionsResult,
            'score_board' => $scoreBoard
        ];

        $this->view('answerer/finish', $data);
    }

    public function insert($data) {
        $insert = $this->model('HistoryModel')->insert($data);
        echo json_encode([
            'success' => $insert > 0
        ]);
    }

    public function answer($data) {
        $question = $this->model('QuestionModel')->getQuestionById($data['question_id']);
        $data['is_correct'] = $data['answer'] == $question['correct_answer'];
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

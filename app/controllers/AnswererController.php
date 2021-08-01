<?php

class AnswererController extends Controller {

    public function index($secondaryId) {
        $this->view('answerer/index', $secondaryId);
    }

    public function answerQuiz($secondaryId, $userId) {
        $data = [
            "questioner_secondary_id" => $secondaryId,
            "answerer_user_id" => $userId
        ];
        $this->view('answerer/answer', $data);
    }

    public function finish() {
        $this->view('answerer/finish');
    }
}

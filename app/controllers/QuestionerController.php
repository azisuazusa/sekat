<?php

class QuestionerController extends Controller {

    public function index() {
        $this->view('questioner/index');
    }

    public function createQuiz($id) {
        $this->view('questioner/create-quiz', $id);
    }

    public function finish($userId) {
        $user = $this->model('UserModel')->getUserById($userId);
        $link = BASE_URL . "/" . $user["secondary_id"];
        $this->view('questioner/finish', $link);
    }
}


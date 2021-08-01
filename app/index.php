<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'config/config.php';

spl_autoload_register(function ($class) {
    include 'controllers/' . $class . '.php';
});

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

$router = new \Bramus\Router\Router();
$questionerController = new QuestionerController();
$answererController = new AnswererController();
$userController = new UserController();
$historyController = new HistoryController();
$questionController = new QuestionController();

$router->get('/', function() use ($questionerController) {
    $questionerController->index();
});

$router->get('/create-quiz/{id}', function($id) use ($questionerController) {
    $questionerController->createQuiz($id);
});

$router->get('/finish/{userId}', function($userId) use ($questionerController) {
    $questionerController->finish($userId);
});

$router->get('/answer-quiz/questioner-secondary-id/{secondaryId}/answerer-user-id/{userId}', function($secondaryId, $userId) use ($answererController) {
    $answererController->answerQuiz($secondaryId, $userId);
});

$router->post('/users', function() use ($userController) {
    $userController->insert($_POST);
});

$router->get('/questions/secondary-id/{secondaryId}', function($secondaryId) use ($questionController) {
    $questionController->questions($secondaryId);
});

$router->post('/questions', function() use ($questionController) {
    $questionController->insert($_POST);
});
$router->put('/questions/{id}', function($id) use ($questionController) {
    $questionController->update($id, $_POST);
});
$router->delete('/questions/{id}', function($id) use ($questionController) {
    $questionController->delete($id);
});
$router->get('/questions/previous/{id}', function($id) use ($questionController) {
    $questionController->previous($id);
});
$router->get('/questions/next/{id}', function($id) use ($questionController) {
    $questionController->next($id);
});

$router->post('/histories', function() use ($historyController) {
    $historyController->insert($_POST);
});

$router->post('/histories/answer', function() use ($historyController) {
    $historyController->answer($_POST);
});

$router->put('/histories/{id}', function($id) use ($historyController) {
    $historyController->update($id, $_POST);
});

$router->get('/answer-quiz/score/questioner-secondary-id/{secondaryId}/answerer-user-id/{answererUserId}', function($secondaryId, $answererUserId) use ($historyController) {
    $historyController->score($secondaryId, $answererUserId);
});

$router->get('/{secondaryId}', function($secondaryId) use ($answererController) {
    $answererController->index($secondaryId);
});


$router->run();

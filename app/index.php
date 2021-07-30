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
$homeController = new HomeController();
$userController = new UserController();
$historyController = new HistoryController();
$questionController = new QuestionController();

$router->get('/', function() use ($homeController) {
    $homeController->index();
});

$router->get('/create-quiz/{id}', function($id) use ($homeController) {
    $homeController->createQuiz($id);
});

$router->get('/finish/{userId}', function($userId) use ($homeController) {
    $homeController->finish($userId);
});

$router->post('/users', function() use ($userController) {
    $userController->insert($_POST);
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
$router->get('/questions/secondary-id/{secondaryId}', function($secondaryId) use ($questionController) {
    $questionController->next($secondaryId);
});

$router->post('/histories', function() use ($historyController) {
    $historyController->insert($_POST);
});
$router->put('/histories/{id}', function($id) use ($historyController) {
    $historyController->update($id, $_POST);
});
$router->get('/histories/score/answerer-user-id/{answererUserId}/secondary-id/{secondaryId}', function($answererUserId, $secondaryId) use ($historyController) {
    $historyController->score($answererUserId, $secondaryId);
});

$router->run();

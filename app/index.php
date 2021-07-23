<?php

require __DIR__ . '/../vendor/autoload.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'config/config.php';

spl_autoload_register(function ($class) {
    include 'controllers/' . $class . '.php';
});

$router = new \Bramus\Router\Router();
$userController = new UserController();
$historyController = new HistoryController();
$questionController = new QuestionController();

$router->post('/users', function() { $userController->insert($_POST); });

$router->post('/questions', function() { $questionController->insert($_POST); });
$router->put('/questions/{id}', function($id) { $questionController->update($id, $_POST); });
$router->delete('/questions/{id}', function($id) { $questionController->delete($id); });
$router->get('/questions/previous/{id}', function($id) { $questionController->previous($id); });
$router->get('/questions/next/{id}', function($id) { $questionController->next($id); });
$router->get('/questions/secondary-id/{secondaryId}', function($secondaryId) { $questionController->next($secondaryId); });

$router->post('/histories', function() { $historyController->insert($_POST); });
$router->put('/histories/{id}', function($id) { $historyController->update($id, $_POST); });
$router->get('/histories/score/answerer-user-id/{answererUserId}/secondary-id/{secondaryId}', function($answererUserId, $secondaryId) { $historyController->score($answererUserId, $secondaryId); });

$router->run();

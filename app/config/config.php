<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

define('BASE_URL', $_ENV('BASE_URL'));
define('DB_HOST', $_ENV('DB_HOST'));
define('DB_USER', $_ENV('DB_USER'));
define('DB_PASS', $_ENV('DB_PASS'));
define('DB_NAME', $_ENV('DB_NAME'));

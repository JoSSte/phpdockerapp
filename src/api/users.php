<?php
ob_start();


require_once __DIR__.'/../vendor/autoload.php';

use JoSSte\Phpdockerapp\UserRepository;
header('Content-Type: application/json');
$users = UserRepository::getAllUsers();
echo json_encode($users,JSON_PRETTY_PRINT);
ob_end_flush();
//TODO add error handling
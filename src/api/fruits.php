<?php
ob_start();

require_once __DIR__.'/../vendor/autoload.php';

use JoSSte\Phpdockerapp\FruitRepository;
header('Content-Type: application/json');
$fruits = FruitRepository::getAllFruitsUnfiltered();
echo json_encode($fruits,JSON_PRETTY_PRINT);
ob_end_flush();
//TODO add error handling
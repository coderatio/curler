<?php
require 'vendor/autoload.php';

$curler = new \Coderatio\Curler\Curler();
$request = $curler->get('https://jsonplaceholder.typicode.com/todos');
$response = $curler->getResponse();

header('Content-Type: application/json');
echo $response;
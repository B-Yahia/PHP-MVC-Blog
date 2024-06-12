<?php

include __DIR__ . "/vendor/autoload.php";

use Framework\Database;
use Dotenv\Dotenv;

$envVar = Dotenv::createImmutable(__DIR__);
$envVar->load();


$config = [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'dbname' => $_ENV['DB_NAME'],
];


$db = new Database($_ENV['DB_DRIVER'], $config, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

echo "Connected to DB";


$query = file_get_contents(__DIR__ . "/Databases.sql");

$stmt = $db->query($query);

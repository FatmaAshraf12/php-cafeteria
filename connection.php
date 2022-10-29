<?php
 require_once __DIR__ . '\vendor\autoload.php';
 require_once __DIR__ . '\DB.php';

 session_start();
 $_SESSION["user_id"] = 1;

$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__));
$env = $dotenv->load();
DB::connect($env['DATABASE'], $env['DATABASE_HOST'], $env['DATABASE_NAME'], $env['DATABASE_USERNAME'], $env['DATABASE_PASSWORD']);

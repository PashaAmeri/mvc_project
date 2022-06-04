<?php

namespace App_hospital;

use App_hospital\app\controller\GetDataDB;
use App_hospital\app\controller\GetForm;
use App_hospital\app\controller\SiteController;
use App_hospital\core\Application;
use App_hospital\middlewares\AuthMiddleware;
use App_hospital\Dotenv\Dotenv;

$root_dir = __DIR__ . '\..\\';
require_once $root_dir . 'vendor/autoload.php';

// $dotenv = Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->load();

$config = [

    'db' => [
        // 'dsn' => $_ENV['DB_DSN'],
        // 'user' => $_ENV['DB_USER'],
        // 'password' => $_ENV['DB_PASSWORD']

        'dsn' => 'mysql:host=localhost;dbname=medic_db',
        'user' => 'root',
        'password' => ''
    ]
];


//new instants of Application class
$app = new Application(__DIR__ . '/../', 'http://localhost:8080', $config);

// routes
$app->get('/', [SiteController::class, 'homeControl']);
$app->get('/home', [SiteController::class, 'homeControl']);
$app->get('/dashboard', [SiteController::class, 'dashbordControl'], [AuthMiddleware::class, 'admin']);
$app->get('/signup', [SiteController::class, 'signUp']);
$app->get('/login', [SiteController::class, 'logIn']);
$app->get('/profile', [SiteController::class, 'docProfile'], [AuthMiddleware::class, 'doctor']);
$app->get('/doctors', [SiteController::class, 'doctorsControl']);

$app->post('/signup', [GetForm::class, 'getRegister']);
$app->post('/login', [GetForm::class, 'getLogin']);
$app->post('/doctors', [SiteController::class, 'doctorsControl']);
$app->post('/dashboard', [SiteController::class, 'dashbordControlPost'], [AuthMiddleware::class, 'admin']);

//run the program
$app->run();

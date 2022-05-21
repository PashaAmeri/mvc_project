<?php

namespace App_hospital;

use App_hospital\app\controller\SiteController;
use App_hospital\core\Application;

$root_dir = __DIR__ . '\..\\';
require_once $root_dir . 'vendor/autoload.php';

//new instants of Application class
$app = new Application(__DIR__ . '/../', 'http://localhost:8080');

// routes
$app->get('/', [SiteController::class, 'homeControl']);
$app->get('/home', [SiteController::class, 'homeControl']);
$app->get('/dashboard', [SiteController::class, 'dashbordControl']);
$app->get('/signup', [SiteController::class, 'signUp']);
$app->get('/login', [SiteController::class, 'logIn']);
$app->get('/profile', [SiteController::class, 'docProfile']);

//run the program
$app->run();

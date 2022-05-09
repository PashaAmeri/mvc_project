<?php

namespace App_hospital;

use App_hospital\app\controller\SiteController;
use App_hospital\core\Application;

$root_dir = __DIR__ . '/../';
require_once $root_dir . 'vendor/autoload.php';

//new instants of Application class
$app = new Application();

// route to '/'
$app->get('/', [SiteController::class, 'homeControl']);

$app->get('/dashbord', [SiteController::class, 'dashbordControl']);

$app->run();

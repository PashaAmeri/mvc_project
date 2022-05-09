<?php

namespace App_hospital;

use App_hospital\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->get('/', function () {

    return 'Home page';
});

$app->run();

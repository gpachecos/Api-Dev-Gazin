<?php

use function src\{
    slimConfiguration,
    basicAuth
};
use App\Controllers\{
    DevPageController,
    DevIdController,
    DevController
};

$app = new \Slim\App(slimConfiguration());

// =======================================

$app->group('',function() use ($app) {
    $app->get('/developer', DevController::class . ':getDevs');
    $app->get('/developers', DevIdController::class . ':getDevById');
    $app->get('/developers_page', DevPageController::class . ':getDevByPagination');
    $app->post('/developer', DevController::class . ':insertDev');
    $app->put('/developer', DevController::class . ':updateDev');
    $app->delete('/developer', DevController::class . ':deleteDev');
})->add(basicAuth());
// =======================================

$app->run();
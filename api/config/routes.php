<?php

declare(strict_types=1);

use Slim\App;
use Api\Http\Action\HomeController;
use Api\Http\Action\Notes\IndexAction;
use Api\Http\Action\Notes\ShowAction;
use Api\Http\Action\Notes\PutAction;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app) {
    $app->group(
        '/api',
        function (RouteCollectorProxy $group) {
            $group->group(
                '/v1',
                function (RouteCollectorProxy $group) {
                    $group->get('/', HomeController::class);

                    $group->group(
                        '/notes',
                        function (RouteCollectorProxy $group) {
                            $group->get('', IndexAction::class);
                            $group->get('/{id:[0-9]+}', ShowAction::class);
                            $group->put('/{id:[0-9]+}', PutAction::class);
                        }
                    );
                }
            );
        }
    );

    return $app;
};
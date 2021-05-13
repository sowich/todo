<?php

declare(strict_types=1);

use Api\Http\Middleware\ApiMiddleware;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use Slim\App;

return [
    App::class => static function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        $app = AppFactory::create();

        $app->addRoutingMiddleware();
        $app->addBodyParsingMiddleware();
        $app->add(new ApiMiddleware());

        $app->addErrorMiddleware(
            $container->get('config')['error']['displayErrorDetails'],
            $container->get('config')['error']['logErrors'],
            $container->get('config')['error']['logErrorDetails'],
            );


        return $app;
    },

    'config' => [
        'error' => [
            'displayErrorDetails' => true,
            'logErrors'           => true,
            'logErrorDetails'     => true,
        ]
    ]
];
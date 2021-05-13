<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Slim\App;

require '../vendor/autoload.php';

(static function(){
    $containerBuilder = require '../config/container.php';
    $containerBuilder = (new ContainerBuilder())->addDefinitions($containerBuilder);
    $container        = $containerBuilder->build();

    (require '../config/routes.php')($container->get(App::class))->run();
})();
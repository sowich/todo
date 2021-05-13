<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;

return [
    PDO::class => static function (ContainerInterface $container) {
        return new PDO($container->get('config')['pdo']);
    },

    'config' => [
        'pdo' => 'sqlite:../Notes.db',
    ]
];
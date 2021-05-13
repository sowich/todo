<?php

declare(strict_types=1);

namespace Api\Http\Action;

use Psr\Http\Message\ResponseInterface;

class HomeController
{
    public function __invoke($request, ResponseInterface $response)
    {
        $response->getBody()->write(
            json_encode([
                'name'    => 'App API',
                'version' => 'v1.0',
            ], JSON_THROW_ON_ERROR)
        );

        return $response;
    }
}
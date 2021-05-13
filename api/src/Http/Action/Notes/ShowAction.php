<?php

declare(strict_types=1);

namespace Api\Http\Action\Notes;

use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;

class ShowAction
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $routeContext = RouteContext::fromRequest($request);
        $route        = $routeContext->getRoute();

        $id = $route->getArgument('id');

        $stmt = $this->pdo->prepare("SELECT * FROM `NOTES` WHERE `ID` = :ID");
        $stmt->execute([':ID' => $id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        $response->getBody()->write(json_encode($results, JSON_THROW_ON_ERROR));

        return $response;
    }
}
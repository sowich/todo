<?php

declare(strict_types=1);

namespace Api\Http\Action\Notes;

use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;

class PutAction
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

        $stmt = $this->pdo->prepare("UPDATE `NOTES` SET `TEXT` = :TEXT WHERE `ID` = :ID");
        $stmt->execute([':TEXT' => $request->getParsedBody()['TEXT'] ?? '', ':ID' => $id]);

        var_dump($this->pdo->errorInfo());

        return $response;
    }

}
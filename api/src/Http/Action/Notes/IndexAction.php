<?php

declare(strict_types=1);

namespace Api\Http\Action\Notes;

use PDO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class IndexAction
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response)
    {
        $stmt    = $this->pdo->query("SELECT * FROM `NOTES`");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $response->getBody()->write(json_encode($results, JSON_THROW_ON_ERROR));

        return $response;
    }
}
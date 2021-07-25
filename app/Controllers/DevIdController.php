<?php

namespace App\Controllers;

use App\DAO\MySQL\Developers\DevsDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class DevIdController
{
    public function getDevById(Request $request, Response $response, array $args): Response
    {
        $queryParams = $request->getQueryParams();
        
        $devsDAO = new DevsDAO();
        $id = (int)$queryParams['id'];
        $devs = $devsDAO->getDevById($id);

        $response = $response->withJson($devs);
        
        return $response;
    }
}
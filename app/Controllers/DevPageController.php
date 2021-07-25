<?php

namespace App\Controllers;

use App\DAO\MySQL\Developers\DevsDAO;
use App\Models\MySQL\developers\DevModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class DevPageController
{
    public function getDevByPagination(Request $request, Response $response, array $args): Response
    {
        $devs = new DevsDAO();
        
        $queryParams = $request->getQueryParams();
        if(!empty($queryParams['page'])){
            $count = $devs->count();
            $limit = (int)($queryParams['limit'] ?? 5);
            $page = (int)($queryParams['page'] ?? 1);

            $offset = ($page-1) * $limit;
            $developers = $devs->getDevByPagination($limit,$offset);
            $pagination = [
                'count'=>$count,
                'page'=>$page,
                'previous'=>$page-1 < 1 ? 1 : $page-1,
                'next'=>$page+1,
                'limit'=>$limit
            ];
        }else{
            $developers = $devs->getAllDevs();
            $pagination = [];
        }
        $result = [
            'data'=>$developers,
            'pagination'=>$pagination
        ];

        $response = $response->withJson($result);
        
        return $response;
    }
}
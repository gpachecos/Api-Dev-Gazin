<?php

namespace App\Controllers;

use App\DAO\MySQL\Developers\DevsDAO;
use App\Models\MySQL\developers\DevModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class DevController
{
    public function getDevs(Request $request, Response $response, array $args): Response
    {
        $devsDAO = new DevsDAO();
        $devs = $devsDAO->getAllDevs();
        $response = $response->withJson($devs);

        return $response;
    }

    public function insertDev(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        
        $devsDAO = new DevsDAO();
        $dev = new DevModel();
        $dev->setNome($data['nome'])
            ->setSexo($data['sexo'])
            ->setIdade($data['idade'])
            ->setHobby($data['hobby'])
            ->setDataNascimento($data['datanascimento']);
        $devsDAO->insertDev($dev);
        
        $response = $response->withJson([
            'message' => 'Dev inserido com sucesso!'
        ]);

        return $response;
    }

    public function updateDev(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        
        $devsDAO = new DevsDAO();
        $dev = new DevModel();
        $dev->setId((int)$data['id'])
            ->setNome($data['nome'])
            ->setSexo($data['sexo'])
            ->setIdade($data['idade'])
            ->setHobby($data['hobby'])
            ->setDataNascimento($data['datanascimento']);
        $devsDAO->updateDev($dev);

        $response = $response->withJson([
            'message' => 'Dados do Dev alterados com sucesso!'
        ]);
        
        return $response;
    }

    public function deleteDev(Request $request, Response $response, array $args): Response
    {
        $queryParams = $request->getQueryParams();
        
        $devsDAO = new DevsDAO();
        $id = (int)$queryParams['id'];
        $devsDAO->deleteDev($id);

        $response = $response->withJson([
            'message' => 'Dev excluído com sucesso!'
        ]);
        
        return $response;
    }
}
<?php
namespace App\Controllers;

include_once (__DIR__."/../../bootstrap.php");
use App\Models\Product;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;

class ProductController
{
    public function retrieve_all(Request $request, Response $response, $args)
    {
        global $entityManager;

        $productRepository = $entityManager->getRepository("App\Models\Product");
        $products = $productRepository->findAll();

        $response->getBody()->write(json_encode($products));
        return $response->withStatus(200)->withHeader("Content-Type", "application/json");
    }

    public function retrieve_by_id(Request $request, Response $response, $args)
    {
        global $entityManager;

        //TODO add preg_match for every input

        $body = $request->getParsedBody();
        $id = $body['id'] ?? "";

        $productRepository = $entityManager->getRepository("App\Models\Product");
        $product = $productRepository->findOneBy(array('id' => $id));

        $response->getBody()->write(json_encode($product));
        return $response->withStatus(200)->withHeader("Content-Type", "application/json");
    }
}
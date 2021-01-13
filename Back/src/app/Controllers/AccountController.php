<?php
namespace App\Controllers;

include_once ('./../../bootstrap.php');
use App\Models\Account;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;

class AccountController
{
    public function login(Request $request, Response $response, $args)
    {
        global $entityManager;

        $body = $request->getParsedBody();
        $login = $body['login'] ?? "";
        $password = $body['password'] ?? "";

        //TODO: add preg_match for every input

        $accountRepository = $entityManager->getRepository("App\Models\Account");
        $account = $accountRepository->findOneBy(array('login' => $login, 'password' => $password));
        if ($account && $login == $account->getLogin() && $password == $account->getPassword())
        {
            $token_creation_time = time();

            $token = JWT::encode($payload, $_ENV["JWT_SECRET"], "HS256");
    
            $payload = [
                "user" => [
                    "login" => $account->getLogin(),
                ],
                "iat" => $token_creation_time,
                "exp" => $token_creation_time + 60,
            ];

            return $response
            ->withHeader("Access-Control-Expose-Headers", "*")
            ->withHeader("Authorization", "Bearer {$token}")
            ->withHeader("Content-Type", "application/json")
            ->withStatus(200);
        } 
        else 
        {
            $result['state'] = "Unknown login and password combination.";
            return $response->withStatus(401)->withHeader("Content-Type", "application/json");
        }
    }

    public function register(Request $request, Response $response, $args)
    {   
        global $entityManager;

        //TODO add preg_match for every input

        $body = $request->getParsedBody();
        $data = json_decode($body['account']);
        $account = new Account;
        $account->setLastName($data->lastname);
        $account->setFirstName($data->firstname);
        $account->setPostalcode($data->address);
        $account->setAddress($data->postalcode);
        $account->setCity($data->city);
        $account->setCountry($data->country);
        $account->setPhone($data->phone);
        $account->setEmail($data->email);
        $account->setPassword($data->password);
        $account->setCivility($data->civility);
        $account->setLogin($data->login);

        $entityManager->persist($account);
        $entityManager->flush();
        
        $response->getBody()->write(json_encode($body['account']));
        return $response->withStatus(201)->withHeader("Content-Type", "application/json");
    }
}
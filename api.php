<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'DLL/gamemanager.php';

$app = new \Slim\App();
$gamemanager = new GameManager();

$app->get("/", function (Request $request, Response $response) {
    return $response->withStatus(200)->write(file_get_contents("docs.html"));
});

$app->get('/games', function (Request $request, Response $response, array $args) {
    global $gamemanager;

    $result = $gamemanager->getGames();

    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($result));
});

$app->get('/games/{id}', function (Request $request, Response $response, array $args) {
    global $gamemanager;

    $id = $args['id'];

    $result = $gamemanager->getGame($id);

    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($result));
});

$app->run();

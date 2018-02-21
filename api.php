<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'DLL/gamemanager.php';

$app = new \Slim\App();
$gamemanager = new GameManager();

$app->post('/games/add/{title}/{developer}/{publisher}/{release_date}', function (Request $request, Response $response, array $args) {
    global $gamemanager;

    $title = $args['title'];
    $developer = $args['developer'];
    $publisher = $args['publisher'];
    $releasedate = $args['release_date'];

    $result = $gamemanager->addGame($title, $developer, $publisher, $releasedate);

    if ($result) {
        return $response->withStatus(200);
    } else {
        return $response->withStatus(400);
    }
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

$app->put('/games/update/{id}/{title}/{developer}/{publisher}/{release_date}', function (Request $request, Response $response, array $args) {
    global $gamemanager;

    $id = $args['id'];
    $title = $args['title'];
    $developer = $args['developer'];
    $publisher = $args['publisher'];
    $releasedate = $args['release_date'];

    $result = $gamemanager->updateGame($id, $title, $developer, $publisher, $releasedate);

    if ($result) {
        return $response->withStatus(200);
    } else {
        return $response->withStatus(400);
    }
});

$app->delete('/games/delete/{id}', function (Request $request, Response $response, array $args) {
    global $gamemanager;

    $id = $args['id'];

    $result = $gamemanager->deleteGame($id);

    if ($result) {
        return $response->withStatus(200);
    } else {
        return $response->withStatus(400);
    }
});

$app->run();

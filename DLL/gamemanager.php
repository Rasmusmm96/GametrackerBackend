<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once "DAL/gamedataaccess.php";

$dataaccess = new GameDataAccess();

class GameManager {

    public function addGame($title, $developer, $publisher, $releasedate) {
        global $dataaccess;

        return $dataaccess->addGame($title, $developer, $publisher, $releasedate);
    }

    public function getGames() {
        global $dataaccess;

        return $dataaccess->getGames();
    }

    public function getGame($id) {
        global $dataaccess;

        return $dataaccess->getGame($id);
    }

    public function updateGame($id, $title, $developer, $publisher, $releasedate) {
        global $dataaccess;

        return $dataaccess->updateGame($id, $title, $developer, $publisher, $releasedate);
    }

    public function deleteGame($id) {
        global $dataaccess;

        return $dataaccess->deleteGame($id);
    }
}

?>

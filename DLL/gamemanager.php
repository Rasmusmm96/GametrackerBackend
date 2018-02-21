<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once "DAL/gamedataaccess.php";

$dataaccess = new GameDataAccess();

class GameManager {

    public function getGames() {
        global $dataaccess;

        return $dataaccess->getGames();
    }

    public function getGame($id) {
        global $dataaccess;

        return $dataaccess->getGame($id);
    }

}

?>

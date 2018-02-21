<?php
class GameDataAccess {

    private function getDatabase() {
        $con = new mysqli(
            'localhost',
            'root',
            'root',
            'Gametracker',
            '8889');

        return $con;
    }

    public function getGames() {
        $db = $this->getDatabase();

        $statement = 'SELECT * from Games';

        $result = $db->query($statement);

        if (!is_null($result)) {
            $myResult = array();
            while($row = $result->fetch_assoc()){
                $myResult[] = $row;
            }
            return $myResult;
        } else {
            return false;
        }
    }

    public function getGame($id) {
        $db = $this->getDatabase();

        $statement = 'SELECT * from Games WHERE id = "'. $id .'"';

        return $db->query($statement)->fetch_assoc();
    }

}
 ?>

<?php
class GameDataAccess {

    private function getDatabase() {
        $con = new mysqli(
            '127.0.0.1',
            'root',
            'root',
            'Gametracker',
            '8889');

        return $con;
    }

    public function getGames() {
        $db = $this->getDatabase();

        $statement = 'SELECT Games.ID, Title, Developer, Publishers.Name as Publisher, DATE_FORMAT(Release_Date, \'%Y-%m-%d\') as Release_Date, Twitter_Handle, Youtube_Id 
                      from Games
                      join Publishers on PublisherID = Publishers.ID';

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

        $statement = 'SELECT Games.ID, Title, Developer, Publishers.Name as Publisher, DATE_FORMAT(Release_Date, \'%Y-%m-%d\') as Release_Date, Twitter_Handle, Youtube_Id 
                      from Games
                      join Publishers on PublisherID = Publishers.ID WHERE Games.ID = "'. $id .'"';

        return $db->query($statement)->fetch_assoc();
    }

}
 ?>

<?php

require_once 'model.php';

class Player extends Model
{
    /**Add new user */
    protected function getAllPlayer()
    {
        try {
            $sql = "SELECT * from Player Order by Player_level DESC;";
            $response = $this->executerRequete($sql);
            $result = $response->rowCount();
            if ($result == 0) {
                return $result;
            } else {
                $response = $response->fetchAll(\PDO::FETCH_ASSOC);
                return $response;
            }
        } catch (Exception $e) {
        }
    }
}

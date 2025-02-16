<?php

require_once 'model.php';

class Images extends Model
{
    /**Add new user */
    protected function getAllImages()
    {
        try {
            $sql = "SELECT * from Images Order by img_id DESC;";
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

    //Set new image
    protected function setNewImage(string $src, string $desc)
    {
        $sql = 'INSERT INTO Images(Img_src, Img_desc) VALUES
                (?,?)';
        $response = $this->executerRequete($sql, array($src, $desc));
        return $response;
    }
}

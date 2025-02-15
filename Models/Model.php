<?php

/** Abstract Model class
 
 * use PDO API
 */


abstract class Model
{
    /** PDO Object */
    private $bdd;

    /**
     * Run an SQL request , with parameters
     * 
     * @param string $sql SQL request
     * @param array $valeurs Values of the parameters
     * @return PDOStatement result sent by request
     */
    protected function executerRequete(string $sql, array $params = null): PDOStatement
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // directly executed
        } else {
            $resultat = $this->getBdd()->prepare($sql);  // prepared execution
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     *Initialize BD connection if necessary
     * 
     * @return PDO PDO object for connection
     */
    private function getBdd()
    {
        if ($this->bdd == null) {

            $hostname = 'localhost';
            $database = 'fallenparadise';
            $username = 'root';
            $password = '';

            // Connection creation
            $this->bdd = new PDO("mysql:host=$hostname;dbname=$database", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}

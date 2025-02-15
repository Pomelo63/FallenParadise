<?php
require_once '../Views/View.php';
class Router
{


    public function __construct()
    {
    }

    public function routerRequest(): void
    {


        try {
            if (isset($_GET['action'])) {
                if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') == 'home') {
                    $view = new View("Home");
                    $view->generer(array(''));
                }            else     if (htmlentities(addslashes($_GET['action']), ENT_QUOTES, 'UTF-8') == 'login') {
                    $view = new View("Login");
                    $view->generer(array(''));
                } 
                else {
                    throw new Exception("Action non valide");
                }
            } else {
                $view = new View("Home");
                $view->generer(array(''));
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function erreur(string $msgErreur): void
    {
        $view = new View("Error");
        $view->generer(array('msgErreur' => $msgErreur));
    }

    private function getParameter($array, $nom): string
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre introuvable");
        }
    }
}
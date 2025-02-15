<?php

require_once '../Models/Player.php';

class ControllerPlayer extends Player
{
    private Player $player;

    public function __construct()
    {
        $this->player = new Player();
    }
    //Get all artist
    public function getAllPlayer()
    {
        try {
            $result = $this->player->getAllPlayer();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
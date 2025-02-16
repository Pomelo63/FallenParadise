<?php

require_once '../Models/Images.php';

class ControllerImages extends Images
{
    private Images $images;

    public function __construct()
    {
        $this->images = new Images();
    }
    //Get all artist
    public function getAllImages()
    {
        try {
            $result = $this->images->getAllImages();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function setNewImage(string $src, string $desc)
    {
        try {
            $result = $this->images->setNewImage($src, $desc);
            return 200;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
<?php
header('Content-Type: application/json');
require_once '../controllers/Images.php';

if (isset($_POST) && isset($_FILES)) {
    $imgtype =  ($_FILES['file']['type']);

    if (strcmp($imgtype, 'image/jpeg') !== 0) {
        echo '{"status": 404,"msg": "selected files is not in an accepted format"}';
        die();
    } else {
        $src =  htmlentities(addslashes($_FILES['file']['name']));
        $desc = htmlentities(addslashes($_POST['desc']), ENT_QUOTES, 'UTF-8');
        $imgpath = '../Public/assets/images/';

        if (file_exists($imgpath . $src)) {
            echo '{"status": 404,"msg": "an image file with that name already exist"}';
            die();
        }
        $ctrlImages = new ControllerImages();
        $response = $ctrlImages->setNewImage($src, $desc);
        if ($response == 200) {
            move_uploaded_file($_FILES['file']['tmp_name'], $imgpath . $src);
            echo '{"status": 200,"msg": "success"}';
            die();
        } else {
            echo '{"status": 404,"msg": "cannot be added"}';
            die();
        }
    }
} else {
    echo '{"status": 404,"msg": "no input find"}';
    die();
}

<?php
require_once '../Controllers/Images.php';
$ctrlImages = new ControllerImages();
$images = $ctrlImages->getAllImages();
if (is_array($images)) {
    $nmbimages = count($images);
} else {
    $nmbimages = 0;
}
$nmbtoload = 0;
?>
<div class="div-home">
    <p> Je suis la page d'accueil</p>
    <div>
        <a href="<?= "index.php?action=classement" ?>">Classement</a>
        <a href="<?= "index.php?action=login" ?>">Nouveau joueur</a>
    </div>
    <div class="home-title">
        <h1>Mon premier carrousel dynamique</h1>
        <div class="pen-div"><i class="fa-solid fa-pen" onclick="openModal()"></i></div>
    </div>
    <div class="modal-container">
        <div class="modal-background" onclick="closeModal()"></div>
        <div class="modal">
            <form method="POST" class="form-add-img" onsubmit='return addNewImage(this, <?= json_encode($images) ?>)'>
                <div>
                    <label for="file">Photo à upload:</label>
                    <input type="file" name="file" id="file" enctype="multipart/form-data" accept=".jpg" required>
                </div>
                <div>
                    <label for="desc">Description:</label>
                    <input type="text" name="desc" id="desc" class="input-text" required>
                </div>
                <button type="submit" class="main_button" id="login_button" required>Ajouter</button>
            </form>
        </div>
    </div>
    <div class="carrousel">
        <?php if ($nmbimages > 0) : ?>
            <div class="carrousel-upper-part">
                <div class="carret"><i class="fa-solid fa-caret-left" onclick='slide(this, <?= json_encode($images) ?>)'></i></div>
                <img class="img-carrousel" src="../Public/assets/images/<?= $images[0]['img_src']; ?>" alt="<?= $images[0]['img_desc']; ?>">
                <div class="carret"><i class="fa-solid fa-caret-right" onclick='slide(this, <?= json_encode($images) ?>)'></i></div>
            </div>
            <div class="dot-container">
                <?php if ($nmbtoload < 5) : ?>
                    <?php foreach ($images as $image) : ?>
                        <?php if ($nmbtoload == 0) : ?>
                            <div class="dot selecteddot" slideId="<?= $nmbtoload; ?>" onclick='dotChange(this, <?= json_encode($images) ?>)'></div>
                        <?php else : ?>
                            <div class="dot" slideId="<?= $nmbtoload; ?>" onclick='dotChange(this, <?= json_encode($images) ?>)'></div>
                        <?php endif; ?>
                    <?php $nmbtoload++;
                    endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
            </div>
    </div>

</div>
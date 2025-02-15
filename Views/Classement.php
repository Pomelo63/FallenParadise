<?php
require_once '../Controllers/Player.php';
$ctrlPlayer = new ControllerPlayer();
$players = $ctrlPlayer->getAllPlayer();
if (is_array($players)) {
    $nmbplayer = count($players);
} else {
    $nmbplayer = 0;
}
?>
<div>
    <p>Classement des héros</p>
    <div>
        <a href="<?= "index.php?action=home" ?>">Accueil</a>
        <a href="<?= "index.php?action=login" ?>">Nouveau joueur</a>
    </div>
    <div class="sortmenu">
        <p>Filtre:</p>
        <p>lvl mini <input type="text" name="lvl-filter" id="lvl-filter" onchange='filterPlayer(this, <?= json_encode($players) ?>)'> </p>
        <p>Trier par Level <i class="fa-solid fa-caret-down" onclick='sortLvl(this, <?= json_encode($players) ?>)'></i></p>
        <p>Trier par Réputation <i class="fa-solid fa-caret-up" onclick='sortRep(this, <?= json_encode($players) ?>)'></i></p>
        <p>Trier par PO <i class="fa-solid fa-caret-up" onclick='sortPO(this, <?= json_encode($players) ?>)'></i></p>
    </div>
    <div class="div-to-show">
        <div class="flex-box">
            <div class="flex">Nom</div>
            <div class="flex">Lvl</div>
            <div class="flex">Reputation</div>
            <div class="flex">Gold</div>
        </div>
        <?php if ($nmbplayer > 0) : ?>
            <?php foreach ($players as $player) : ?>
                <div class="flex-box">
                    <div class="flex"><?= $player['player_name']; ?></div>
                    <div class="flex"><?= $player['player_level']; ?></div>
                    <div class="flex"><?= $player['player_reputation']; ?></div>
                    <div class="flex"><?= $player['player_gold']; ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
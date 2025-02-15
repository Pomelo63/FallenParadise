<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Public/style.css">
    <title>FallenParadise</title>
</head>

<body>
    <?php
    //upload Header
    require 'Components/header.php'; ?>
    <main class="main" id="main">
        <?php
        echo $contenu; ?>
    </main>
    <div id="modal"></div>
    <?php
     require 'Components/footer.php'; ?>
    <script src="../Public/index.js"></script>
</body>

</html>